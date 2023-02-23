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
        'quantity',
        'cauhinh',
        'id_brand',
        'featured',
        'create_date',
        'status',
    ];


    public function scopeSearch($query)
    {
        if ($key = request()->key) {

            $query = $query->where('name', 'like', '%' . $key . '%');
        }
        // if (request('cat_id')) {
        //     $query = $query->where('id_ca', 'like', request('cat_id'));
        // }
        return $query;
    }

    public function cata()
    {
        return $this->hasOne(Caregory::class, 'id', 'id_ca');
    }
}
