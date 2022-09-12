<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $table = 'inventories';
    protected $fillable = ['id', 'center_id', 'product_id', 'quantity', 'updated', 'created'];
    protected $primaryKey = 'id';


    public function center()
    {
        return $this->belongsTo(Center::class, 'center_id')->latest()->paginate(10);
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id')->latest()->paginate(10);
    }
}
