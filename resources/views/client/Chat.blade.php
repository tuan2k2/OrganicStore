@extends('frontend.format')

@section('content')

<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css" rel="stylesheet">
    <link href=" {{ asset('frontend/css/styleChat.css ' )}}" type="text/css" rel="stylesheet">
</head>
<section>
    <div class="container">
        <h3 class=" text-center">Messaging</h3>
        <div class="messaging">
            <div class="inbox_msg">
                <div class="inbox_people">
                    <div class="headind_srch">
                        <div class="recent_heading">
                            <h4>Recent</h4>
                        </div>
                        <div class="srch_bar">
                            <div class="stylish-input-group">
                                <input type="text" class="search-bar" placeholder="Search">
                                <span class="input-group-addon">
                                    <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="inbox_chat cursor-pointer" id="connect">
                        @foreach ($users as $user)

                        <div class="chat_list " data-id="{{$user->idKH}}" data-img="url">
                            <div class="chat_people">
                                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                <div class="chat_ib">
                                    <h5>{{$user->tenKH}} </h5>

                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="mesgs">
                    <div class="msg_history">
                        <div class="incoming_msg">
                            <!-- <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                            <div class="received_msg">
                                <div class="received_withd_msg">
                                    <p class="text_send">Test which is a new approach to have all
                                        solutions</p>
                                    <span class="time_date"> 11:01 AM | June 9</span>
                                </div>
                            </div> -->
                        </div>
                        <div class="outgoing_msg">
                            <!-- <div class="sent_msg">
                                <p>Test which is a new approach to have all
                                    solutions</p>
                                <span class="time_date"> 11:01 AM | June 9</span>
                            </div> -->
                        </div>
                    </div>
                    <div class="type_msg">
                        <div class="input_msg_write">
                            <input type="text" class="write_msg" placeholder="Type a message" id="title" />
                            <button class="msg_send_btn" type="button" id="send"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
<script>
    let connect = false;
    var channel;
    var pusher;
    var ownerId;
    document.getElementById('send').addEventListener('click', function() {
        const title = document.getElementById('title').value;
        $.ajax({
            type: 'POST',
            url: `{{url('send/chat')}}`,
            headers: {
                'X-CSRF-TOKEN': $('meta[name=" csrf-token"]').attr('content')
            },
            data: {
                "_token": "{{ csrf_token() }}",
                "id": '',
                'channel': 'chat-' + ownerId + '-with-' + '{{$id_user}}',
                'body': title,
                'to': ownerId,
            }
        });
    });
    $(document).ready(function() {
        $('.chat_list').on('click', function(event) {
            console.log("check ownerId", ownerId);

            if (!ownerId || ownerId != $(this).data('id')) {
                ownerId = $(this).data('id');
                console.log("check ownerId", ownerId);
                Pusher.logToConsole = true;

                pusher = new Pusher('3c3641c3f12a98d0d7b7', {
                    wsHost: '127.0.0.1',
                    wsPort: '6001',
                    wssPort: '6001',
                    wsPath: null,
                    disableStats: true,
                    authEndpoint: `{{url('sockets/connect')}}`,
                    forceTLS: false,
                    cluster: 'ap1',
                    auth: {
                        headers: {
                            "X-CSRF-Token": "{{ csrf_token() }}",
                            "X-App-ID": null
                        }
                    },
                    enabledTransports: ["ws"]
                });
                channel = pusher.subscribe('chat-' + ownerId + '-with-' + '{{$id_user}}');
                connect = !connect;
                channel.bind('log-message', function(data) {
                    const msgHistoryContainer = document.querySelector('.msg_history');
                    const newDiv = document.createElement('div');

                    if (data.to === ownerId) {
                        newDiv.classList.add('incoming_msg');
                        const incomingMsgImg = document.createElement('div');
                    } else {
                        newDiv.classList.add('outgoing_msg');
                        const incomingMsgImg = document.createElement('div');
                    }

                    const receivedMsg = document.createElement('div');
                    receivedMsg.classList.add('received_msg');

                    const receivedWithdMsg = document.createElement('div');
                    receivedWithdMsg.classList.add('received_withd_msg');
                    const currentTime = new Date().toLocaleTimeString([], {
                        hour: '2-digit',
                        minute: '2-digit'
                    });
                    const currentDate = new Date().toLocaleDateString([], {
                        month: 'long',
                        day: 'numeric'
                    });

                    receivedWithdMsg.innerHTML = `
                        <p>${data.body}</p>
                        <span class="time_date">${currentTime} | ${currentDate}</span>
                    `;
                    receivedMsg.appendChild(receivedWithdMsg);
                    newDiv.appendChild(receivedMsg);
                    msgHistoryContainer.appendChild(newDiv);
                    // if (channel) {
                    //     channel.unbind_all();
                    //     const msgHistoryContainer = document.querySelector('.incoming_msg');
                    //     msgHistoryContainer.innerHTML = '';
                    //     const msgHistoryContainer1 = document.querySelector('.outgoing_msg');
                    //     msgHistoryContainer1.innerHTML = '';
                    // }
                });
            }
        })
    });
</script>
@endsection