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
            Thông tin khách hàng
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
                        <th style="width:40%;">Tên Khách hàng</th>
                        <th style="width:60%;">SDT</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td> {{$order->tenKH}}</td>
                        <td>{{$order->SDT}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<br></br>
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Thông tin vận chuyển
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
                        <th style="width:30%;">Tên người vận chuyển </th>
                        <th style="width:40%;">Địa chỉ</th>
                        <th style="width:30%;">SDT</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$order->name}}</td>
                        <td>{{$order->diaChiKH}}</td>
                        <td>{{$order->SDT}}</td>

                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<br></br>
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Chi tiết đơn hàng
        </div>
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
                        <th style="width:150px;">Tên sản phẩm </th>
                        <th style="width:150px;">số lượng</th>
                        <th style="width:100px;">giá</th>
                        <th style="width:50px;">tổng tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="checkbox" name="post[]"></td>
                        <td>{{$order->product_name}}</td>
                        <td>{{$order->product_sales_quantity}}</td>
                        <td>{{$order->product_price}}</td>
                        <td>{{$order->order_total}}</td>
                    </tr>
                </tbody>
            </table>

        </div>
        <footer class="panel-footer">
            <div class="row">
                <div class="col-sm-5 text-center">
                    <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
                </div>
                <div class="col-sm-7 text-right text-center-xs">
                    <ul class="pagination pagination-sm m-t-none m-b-none">
                        <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
                        <li><a href="">1</a></li>
                        <li><a href="">2</a></li>
                        <li><a href="">3</a></li>
                        <li><a href="">4</a></li>
                        <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
                    </ul>
                </div>
            </div>
        </footer>
    </div>
</div>
@endsection