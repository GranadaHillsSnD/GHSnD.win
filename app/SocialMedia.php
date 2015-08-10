<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
  protected $table = 'social_media';

  protected $primaryKey = 'social_media_id';

  protected $fillable = ['username',
                        'tweet',
                        'caption',
                        'imgUrl',
                        'message',
                        'source',
                        'approver_id',
                        'datetime_posted',
                        'updated_at', 'created_at'];

}
