<?php
class TimeEntry
{
    // property declaration
    public $var = 'a default value';
    function __construct($member_id,$day,$month,$year,$billable_hours){
      $this->member_id = $member_id;
      $this->day = $day;
      $this->month = $month;
      $this->year = $year;
      $this->billable_hours = $billable_hours;
    }
}

?>
