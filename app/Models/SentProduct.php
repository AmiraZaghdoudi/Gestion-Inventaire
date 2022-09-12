<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SentProduct extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $table = 'sent_products';
    protected $fillable = ['id', 'exchange_id', 'product_id'];
    protected $primaryKey = 'id';

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function exchangeSend()
    {
        return $this->belongsTo(ExchangedSend::class, 'exchange_id');
    }
}
