<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VOUCHER extends Model
{
    use HasFactory;
    protected $table = 'voucher';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'code',
        'content',
        'discount',
        'quanity',
        'condition',
        'dateStart',
        'endStart',
    ];
}
