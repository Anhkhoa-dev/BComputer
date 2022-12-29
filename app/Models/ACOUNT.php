<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ACOUNT extends Model
{
    use HasFactory;
    protected $table = 'tbuser';
    // protected $timestamp = false;
    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'fullname',
        'birthday',
        'email',
        'phone',
        'address',
        'image',
        'password',
        'level',
        'status',
        'remember_token',
        'dateRegister',
        'loginStatus',
        'device_token',
    ];
}
