<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'client'; // karena pakai nama tabel tunggal
    protected $fillable = ['name', 'address', 'beginning_contract_date', 'end_contract_date'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
