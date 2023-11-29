<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_payment';
    protected $table = 'payment'; // Tên bảng
    public $timestamps = false;
    protected $fillable = ['payment_method', 'payment_status'];
}
