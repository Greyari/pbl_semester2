<?php
namespace App\Models;

use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, HasApiTokens, Notifiable, CanResetPassword;

    protected $table = "admin";
    protected $fillable = ['email', 'no_hp', 'email_verified_at'];

    public $timestamps = false; 
}
