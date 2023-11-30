<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_detail extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_detail';
    protected $table = 'order_detail'; // Tên bảng
    public $timestamps = false;
    protected $fillable = ['id_order', 'product_id', 'product_name', 'product_price', 'product_sales_quantity'];
}
