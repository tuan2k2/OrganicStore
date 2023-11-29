@extends('frontend.admin')
@section('content')
<style>
    /* CSS để tùy chỉnh bảng */
    .custom-table {
        width: 100%;
        border-collapse: collapse;
    }

    .custom-table th,
    .custom-table td {
        padding: 10px;
        text-align: center;
    }

    .custom-table th {
        background-color: #f0f0f0;
        font-weight: bold;
    }

    .custom-table tbody tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .custom-table tbody tr:hover {
        background-color: #f0f0f0;
    }

    .custom-table td:first-child {
        padding-left: 0;
    }

    .custom-table td:last-child {
        padding-right: 0;
    }

    .btn {
        text-decoration: none;
        padding: 6px 12px;
        border-radius: 4px;
    }

    .btn-primary {
        color: #fff;
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-danger {
        color: #fff;
        background-color: #dc3545;
        border-color: #dc3545;
    }

    .btn:hover {
        text-decoration: none;
    }

    .fa {
        vertical-align: middle;
    }
</style>
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Danh sách đơn hàng
        </div>
        <?php

        use Illuminate\Support\Facades\Session;

        $message_1 = Session::get('message');
        if ($message_1) {
            echo '<span class="text-alert">' . $message_1 . '</span>';
            Session::put('message', null);
        }
        ?>
        <div class="row w3-res-tb">
            <div class="col-sm-5 m-b-xs">
                <select class="input-sm form-control w-sm inline v-middle">
                    <option value="0">Bulk action</option>
                    <option value="1">Delete selected</option>
                    <option value="2">Bulk edit</option>
                    <option value="3">Export</option>
                </select>
                <button class="btn btn-sm btn-default">Apply</button>
            </div>
            <div class="col-sm-4">
            </div>
            <div class="col-sm-3">
                <div class="input-group">
                    <input type="text" class="input-sm form-control" placeholder="Search">
                    <span class="input-group-btn">
                        <button class="btn btn-sm btn-default" type="button">Go!</button>
                    </span>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            @if(Session::has('success_message'))
            <div class="alert alert-success">
                {{ Session::get('success_message') }}
            </div>
            @else
            <div class="alert alert-success">
                {{ Session::get('unsuccess_message') }}
            </div>
            @endif
            <table class="table table-striped custom-table">
                <thead>
                    <tr>
                        <th style="width:20px;"></th>
                        <th style="width:150px;">Tên người đặt</th>
                        <th style="width:150px;">Tổng tiền</th>
                        <th style="width:100px;">Tình trạng</th>
                        <th style="width:50px;">Hiển thị</th>
                        <th style="width:50px;">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($all_orders as $key => $order)
                    <tr>
                        <td><input type="checkbox" name="post[]"></td>
                        <td>{{ $order->customer_name}}</td>
                        <td>{{ $order->order_total }}</td>
                        <td>{{ $order->order_status }}</td>
                        <td><a href="{{ route('viewOrder', ['orderid' => $order->id_order]) }}" class="btn btn-primary btn-sm">Sửa</a></td>
                        <td><a onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này?')" href="#" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
        <footer class="panel-footer">
            <div class="row">
                <div class="col-sm-5 text-center">
                    <small class="text-muted inline m-t-sm m-b-sm"></small>
                </div>
                <div class="col-sm-7 text-right text-center-xs">
                    <ul class="pagination pagination-sm m-t-none m-b-none">
                        {!!$all_orders->links('pagination::bootstrap-4')!!}
                    </ul>
                </div>
            </div>
        </footer>
    </div>
</div>
@endsection