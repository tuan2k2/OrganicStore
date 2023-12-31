<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_coupon extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'coupon_name', 'coupon_time', 'coupon_condition', 'coupon_number', 'coupon_code'
    ];

    protected $primaryKey = 'coupon_id';
    protected $table = 'tbl_coupon';
}
