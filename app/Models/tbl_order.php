<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_order extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_order';
    protected $table = 'tbl_order'; // Tên bảng
    public $timestamps = false;
    protected $fillable = ['idKH', 'id', 'id_payment', 'order_total', 'order_status'];
}
