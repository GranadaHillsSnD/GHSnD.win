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
                        'message',
                        'source',
                        'link',
                        'resize',
                        'file1_name',
                        'file1_url',
                        'file2_name',
                        'file2_url',
                        'approved',
                        'approver_id',
                        'datetime_posted',
                        'updated_at', 'created_at'];

}
