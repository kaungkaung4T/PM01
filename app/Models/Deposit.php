<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'customer_name',
        'code',
        'amount',
        'system_user',
        'status'
    ];
}
