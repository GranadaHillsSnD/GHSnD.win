<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscribers extends Model
{
    protected $table = 'subscribers';

    protected $primaryKey = 'subscriber_id';

    protected $fillable = ['name', 'email', 'updated_at', 'created_at'];
}
