<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;
    protected $table = 'oderdetails';
    // protected $timestamp = false;
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_order',
        'id_pro',
        'price',
        'qty',
        'discount',
        'totalItem',
    ];
}
