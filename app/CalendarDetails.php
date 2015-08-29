<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CalendarDetails extends Model
{
  protected $table = 'calendar_details';

  protected $primaryKey = 'details_id';

  protected $fillable = ['id', 'address1', 'address2', 'city', 'state', 'zip',
              'contact', 'contact_phone', 'contact_email', 'description',
              'file1_name', 'file2_name', 'file3_name', 'file4_name', 'file5_name',
              'file1', 'file2', 'file3', 'file4', 'file5','password', 'updated_at', 'created_at'];
}
