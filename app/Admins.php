<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admins extends Model
{
  protected $table = 'admins';

  protected $primaryKey = 'admin_id';

  protected $fillable = ['name', 'email', 'password', 'updated_at', 'created_at'];

  protected $hidden = 'password';
}
