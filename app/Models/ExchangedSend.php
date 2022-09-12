<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExchangedSend extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $table = 'exchange_sends';
    protected $fillable = ['id', 'receiver_id', 'transmitter_id', 'is_new', 'acceptance_status'];
    protected $primaryKey = 'id';

    public function receiverCenter()
    {
        return $this->belongsTo(Center::class, 'receiver_id');
    }

    public function transmetterCenter()
    {
        return $this->belongsTo(Center::class, 'transmitter_id');
    }

    public function sentProducts()
    {
        return $this->hasMany(sentProduct::class, 'exchange_id', 'id');
    }
}
