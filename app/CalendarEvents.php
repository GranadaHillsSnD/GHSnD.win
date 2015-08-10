<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CalendarEvents extends Model
{
  protected $table = 'calendar_events';

  protected $primaryKey = 'cal_event_id';

  protected $fillable = ['event_title',
                      'event_start', 'event_end',
                      'address1', 'address2', 'city', 'state', 'zip',
                      'contact', 'contact_phone', 'contact_email',
                      'description',
                      'file1_name', 'file2_name', 'file3_name', 'file4_name', 'file5_name',
                      'file1', 'file2', 'file3', 'file4', 'file5',
                      'updated_at', 'created_at'];
}
