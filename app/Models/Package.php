<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'amount',
        'rate',
        'reward_wallet_1',
        'reward_wallet_2',
        'days'
    ];
}
