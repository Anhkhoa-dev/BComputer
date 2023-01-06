<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class USER_ADDRESS extends Model
{
    use HasFactory;
    protected $table = 'user_address';
    // protected $timestamp = false;
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'id_tk',
        'fullname',
        'phone',
        'address',
        'wards',
        'district',
        'province',
        'status',
    ];
}
