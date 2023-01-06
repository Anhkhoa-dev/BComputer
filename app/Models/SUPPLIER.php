<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SUPPLIER extends Model
{
    use HasFactory;
    protected $table = 'tbsupplier';
    // protected $timestamp = false;
    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'supplierName',
        'image',
        'address',
        'phone',
        'email',
        'status',
    ];
}
