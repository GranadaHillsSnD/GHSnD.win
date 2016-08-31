<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CalendarEvents extends Model
{
  protected $table = 'calendar_events';

  protected $primaryKey = 'event_id';

  protected $fillable = ['title', 'all_day', 'color', 'description', 'location',
                      'file1_name', 'file1_url', 'file2_name', 'file2_url',
                      'start', 'end',
                      'updated_at', 'created_at'];

  protected $dates = ['start', 'end'];

  /**
   * Get the event's id number
   *
   * @return int
   */
  public function getId() {
      return $this->id;
  }

  /**
   * Get the event's title
   *
   * @return string
   */
  public function getTitle()
  {
      return $this->title;
  }

  /**
   * Is it an all day event?
   *
   * @return bool
   */
  public function isAllDay()
  {
      return (bool)$this->all_day;
  }

  /**
   * Get the start time
   *
   * @return DateTime
   */
  public function getStart()
  {
      return $this->start;
  }

  /**
   * Get the end time
   *
   * @return DateTime
   */
  public function getEnd()
  {
      return $this->end;
  }
}
