<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BRAND extends Model
{
    use HasFactory;
    protected $table = 'brands';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'name',
        'image',
        'status',
    ];
}
