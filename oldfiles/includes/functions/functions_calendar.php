<?php

require('includes/class/class.calendar.php');

function generate_mini_calendar($date=NULL, $selected_dates=NULL)
{
	global $extra;
	$extra['add_css'][] = 'mini_calendar';
	$extra['add_js'][] = 'core/calendar';
	$calendar = new Calendar($date);
	if (!empty($selected_dates))
		$calendar->highlighted_dates = $selected_dates;
	return $calendar->output_calendar();
}

function generate_full_calendar($date=NULL, $events=NULL)
{
	global $extra;	
	$extra['add_css'][] = 'full_calendar';
	$extra['add_js'][] = 'core/calendar';	
	$calendar = new Calendar($date);
	if (!empty($selected_dates))
		$calendar->events = $events;
	$calendar->full_calendar = true;
	return $calendar->output_calendar();
}

?>