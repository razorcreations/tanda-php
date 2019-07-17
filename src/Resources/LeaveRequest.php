<?php

namespace RazorCreations\Tanda\Resources;

class LeaveRequest extends Resource {
	public $id;
	public $department_id;
	public $user_id;
	public $reason;
	public $leave_type;
	public $hours;
	public $start;
	public $finish;
	public $start_time;
	public $finish_time;
	public $status;
	public $multitagging;
	public $all_day;
	public $daily_breakdown;
}