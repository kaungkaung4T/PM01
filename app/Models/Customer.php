<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use HasFactory;
    protected $guard = 'customer';
    protected $fillable = [
        'system_user',
        'deposit_amount',
        'user_id',
        'deposit_id',
        'username',
        'password',
        'phone',
        'nric',
        'name',
        'bank_type',
        'bank_number',
        'remark',
        'parent_user',
        'fake',
        'status'
    ];

    public function system_user_data ()  {
        // return $this->hasMany('App\Models\User', 'id', 'system_user');       // For Many
        return $this->hasOne('App\Models\User', 'id', 'system_user');
    }

    public function deposit_data ()  {
        return $this->hasOne('App\Models\Deposit', 'id', 'deposit_amount');
    }

}
