<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = ['name', 'detail'];
    protected $primaryKey = 'id';

    public function sentProducts()
    {
        return $this->hasMany(sentProduct::class, 'product_id', 'id');
    }

    public function inventories()
    {
        return $this->hasMany(Inventory::class, 'product_id', 'id');
    }
}
