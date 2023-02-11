<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'order';
    // protected $timestamp = false;
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'id_tk',
        'date_order',
        'address',
        'ship',
        'cod',
        'payment',
        'id_voucher',
        'statusOrder',
    ];



}
