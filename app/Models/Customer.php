<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
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
        'fake'
    ];

    public function system_user_data ()  {
        return $this->hasMany('App\Models\User', 'id', 'id');
    }
}
