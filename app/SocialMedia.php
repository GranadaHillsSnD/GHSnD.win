<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
  protected $table = 'social_media';

  protected $primaryKey = 'social_media_id';

  protected $fillable = ['username',
                        'profile_pic_url',
                        'insta_id',
                        'tweet',
                        'caption',
                        'imgUrl',
                        'message',
                        'source',
                        'link',
                        'width',
                        'height',
                        'resize',
                        'approved',
                        'approver_id',
                        'datetime_posted',
                        'updated_at', 'created_at'];

}
