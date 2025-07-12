<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order'; // karena pakai nama tabel tunggal
    protected $fillable = ['client_id', 'item_name', 'item_price'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
