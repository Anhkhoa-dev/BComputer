<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SUPPLIER extends Model
{
    use HasFactory;
    protected $table = 'supplier';
    // protected $timestamp = false;
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'name',
        'image',
        'address',
        'phone',
        'email',
        'status',
    ];
}
