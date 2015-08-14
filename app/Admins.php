<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Admins extends Model implements AuthenticatableContract, CanResetPasswordContract
{

  use Authenticatable, CanResetPassword;
  
  protected $table = 'admins';

  protected $primaryKey = 'admin_id';

  protected $fillable = ['name', 'email', 'password', 'updated_at', 'created_at'];

  protected $hidden = 'password';

}
