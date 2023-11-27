<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'shipping'; // Tên bảng
    public $timestamps = false;
    protected $fillable = ['name', 'diaChiKH', 'SDT', 'email', 'note'];
}
