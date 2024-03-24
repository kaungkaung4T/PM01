<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdrawal extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'customer_name',
        'code',
        'amount',
        'remark',
        'wallet',
        'wallet1',
        'wallet2',
        'wallet3',
        'system_user',
        'complete_date',
        'reject_date',
        'status',
        'completed_rejected_user'
    ];

    public function system_user_data ()  {
        // return $this->hasMany('App\Models\User', 'id', 'system_user');       // For Many
        return $this->hasOne('App\Models\User', 'id', 'system_user');
    }

    public function completed_rejected_user_user_data ()  {
        // return $this->hasMany('App\Models\User', 'id', 'completed_rejected_user');       // For Many
        return $this->hasOne('App\Models\User', 'id', 'completed_rejected_user');
    }
}
