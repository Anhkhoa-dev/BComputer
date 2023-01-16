<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $table = 'product';
    // protected $timestamp = false;
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'name',
        'slug',
        'id_ca',
        'discount',
        'sup_id',
        'description',
        'price',
        'quanity',
        'cauhinh',
        'id_brand',
        'featured',
    ];
}