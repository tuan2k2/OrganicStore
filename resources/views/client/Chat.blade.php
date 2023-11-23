@extends('frontend.format')

@section('content')
<section class="breadcrumb-section set-bg" data-setbg=" {{ asset('frontend/img/breadcrumb.jpg')}}">
    <div>huan</div>
    <div class="m-5">
        <input type="text" id="title" class="w-full">
        <button type="button" id="send">Send</button>
        <button type="button" id="connect">connect</button>
    </div>
</section>

<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
<script>

</script>
<script>
    let connect = false;
    var channel;
    var pusher;
    document.getElementById('send').addEventListener('click', function() {
        const title = document.getElementById('title').value;
        $.ajax({
            type: 'POST',
            url: `{{url('send/chat')}}`,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        });
    });
    document.getElementById('connect').addEventListener('click', function() {
        Pusher.logToConsole = true;
        if (!connect) {
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

            channel = pusher.subscribe('channel');
            connect = !connect;
            channel.bind('logmessage', function(data) {
                alert(JSON.stringify(data));
            });
        }
    })
</script>
@endsection