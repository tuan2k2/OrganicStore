<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model
{
    use HasFactory;
    protected $primaryKey = 'idKH';
    protected $table = 'KhachHang'; // Tên bảng
    public $timestamps = false;
    protected $fillable = ['tenKH', 'diaChiKH', 'SDT', 'Email', 'taikhoan', 'matKhau', 'kh_token'];
}
