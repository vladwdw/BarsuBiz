<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
class User extends Authenticatable implements MustVerifyEmail
{
    use AuthenticatableTrait;
    use HasFactory;
    use Notifiable;
    protected $table = 'users';
    
}
