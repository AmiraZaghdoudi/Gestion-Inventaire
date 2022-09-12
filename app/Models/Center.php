<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $table = 'centers';
    protected $fillable = ['id', 'name', 'admin_id', 'address', 'updated', 'created', 'email'];
    protected $primaryKey = 'id';

    public function exchangedSendReceivers()
    {
        return $this->hasMany(ExchangedSend::class, 'receiver_id', 'id');
    }

    public function exchangedSendTransmitters()
    {
        return $this->hasMany(ExchangedSend::class, 'transmitter_id', 'id');
    }

    public function inventories()
    {
        return $this->hasMany(Inventory::class, 'center_id', 'id');
    }
}
