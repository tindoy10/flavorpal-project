<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    protected $primaryKey = 'user_id';

    protected $fillable = ['email', 'login_time'];
}
