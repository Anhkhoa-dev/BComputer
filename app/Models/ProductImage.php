<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;
    protected $table = 'productimage';
    // protected $timestamp = false;
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'id_pro',
        'image',
    ];
}
