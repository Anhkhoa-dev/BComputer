<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ACOUNT extends Model
{
    use HasFactory;
    protected $table = 'tbemployee';

    protected $primaryKey = 'empId';
    protected $fillable = [
        'empId',
        'fullname',
        'birthday',
        'email',
        'phone',
        'address',
        'image',
        'password',
        'role',
        'status'  
    ];
}
