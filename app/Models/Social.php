<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'provider_user_id', 'provider', 'idKH'
    ];

    protected $primaryKey = 'user_id';
    protected $table = 'tbl_social';
}
