<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // ✅ Use Authenticatable instead of Model
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable // ✅ Extend Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users'; // ✅ Define table name

    protected $fillable = [
        'name', 'address', 'mobile', 'gmail', 'city', 'district', 'pin', 'password','operator_type','is_deleted','deleted'
    ];

    protected $hidden = [
        'password',
    ];


    

//////////////////////////16.04.2025///////////////////////



   public function expenses()
    {
        return $this->hasMany(Expense::class, 'created_by');
    }


}
