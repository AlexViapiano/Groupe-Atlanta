<?php
/**
* Calendar Generation Class
*
* This class provides a simple reuasable means to produce month calendars in valid html
*
* @version 2.8
* @author Jim Mayes <jim.mayes@gmail.com>
* @link http://style-vs-substance.com
* @copyright Copyright (c) 2008, Jim Mayes
* @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.txt GPL v2.0
*/

class Calendar{
	var $date;
	var $year;
	var $month;
	var $day;
	
	var $full_calendar = false;
	var $show_events = true;
	var $editor = false;
	var $editor_class = '';
	
	var $week_start_on = FALSE;
	var $week_start = 7;// sunday
	
	var $link_days = TRUE;
	var $link_to;
	var $formatted_link_to;
	
	var $mark_today = TRUE;
	var $today_date_class = 'today';
	
	var $mark_selected = TRUE;
	var $selected_date_class = 'selected';
	
	var $mark_passed = TRUE;
	var $passed_date_class = 'passed';
	
	var $highlighted_dates;
	var $default_highlighted_class = 'highlighted';
	
	
	/* CONSTRUCTOR */
	function Calendar($date = NULL, $year = NULL, $month = NULL){
		global $extra;
	
		$self = htmlspecialchars($_SERVER['PHP_SELF']);
		$this->link_to = 'calendar';
		$this->editor = $extra['is_admin'];
		
		if( is_null($year) || is_null($month) ){
			if( !is_null($date)){
				//-------- strtotime the submitted date to ensure correct format
				$this->date = date("Y-m-d", strtotime($date));
			}
			else if (isset($_GET['date']) && (!empty($_GET['date']))){
				$this->date = date("Y-m-d", strtotime($_GET['date']));
			}
			 else {
				//-------------------------- no date submitted, use today's date
				$this->date = date("Y-m-d");
			}
			$this->set_date_parts_from_date($this->date);
		} else {
			$this->year		= $year;
			$this->month	= str_pad($month, 2, '0', STR_PAD_LEFT);
		}	
	}
	
	function set_date_parts_from_date($date){
		$this->year		= date("Y", strtotime($date));
		$this->month	= date("m", strtotime($date));
		$this->day		= date("d", strtotime($date));
	}
	
	function day_of_week($date){
		$day_of_week = date("N", $date);
		if( !is_numeric($day_of_week) ){
			$day_of_week = date("w", $date);
			if( $day_of_week == 0 ){
				$day_of_week = 7;
			}
		}
		return $day_of_week;
	}
	
	function event_list($find_date)
	{
		global $languageid, $extra;
		$found = false;
		$events = query_array("select * from calendar where date ='".$find_date."'");
		foreach ($events as $event)
		{
			if ($extra['is_admin'])
				$admin_action = '<br /><a href="'.$extra['current_link'].'?action=edit_event&id='.$event['id'].'" title="Click to edit this event">Edit</a> | 
					<a href="'.$extra['current_link'].'?action=del_event&id='.$event['id'].'" title="Click to delete this event">Del</a>';
			$found .= 
            	'<ul class="events"><li>
                '.$event['title_'.$languageid].'<div class="event-details"> '.$event['desc_'.$languageid].' '.$admin_action.'</div>
               </li></ul>';
		}
		return $found ? $found : false;
	}
	
	function output_calendar($year = NULL, $month = NULL, $calendar_class = 'calendar'){
		global $extra;
		if( $this->week_start_on !== FALSE ){
			echo "The property week_start_on is replaced due to a bug present in version before 2.6. of this class! Use the property week_start instead!";
			exit;
		}
		
		//--------------------- override class methods if values passed directly
		$year = ( is_null($year) )? $this->year : $year;
		$month = ( is_null($month) )? $this->month : str_pad($month, 2, '0', STR_PAD_LEFT);
		$this->last_year = strtotime($this->year.'-'.$this->month.'-01 -1 days');
		$this->last_month = strtotime($this->year.'-'.$this->month.'-01 -1 days');	
	
		//------------------------------------------- create first date of month
		$month_start_date = strtotime($year . "-" . $month . "-01");
		//------------------------- first day of month falls on what day of week
		$first_day_falls_on = $this->day_of_week($month_start_date);
		//----------------------------------------- find number of days in month
		$days_in_month = date("t", $month_start_date);
		//-------------------------------------------- create last date of month
		$month_end_date = strtotime($year . "-" . $month . "-" . $days_in_month);
		//----------------------- calc offset to find number of cells to prepend
		$start_week_offset = $first_day_falls_on - $this->week_start;
		$prepend = ( $start_week_offset < 0 )? 7 - abs($start_week_offset) : $first_day_falls_on - $this->week_start;
		//-------------------------- last day of month falls on what day of week
		$last_day_falls_on = $this->day_of_week($month_end_date);
		
		$this->next_year = strtotime($this->year.'-'.$this->month.'-'.$days_in_month.' +1 days');
		$this->next_month = strtotime($this->year.'-'.$this->month.'-'.$days_in_month.' +1 days');

		//------------------------------------------------- start table, caption
		$output  = $this->full_calendar ? "<table id=\"cal_1\" class=\"calendar full\" width=\"100%\" >\n" : "<table class=\"" . $calendar_class . "\">\n";
		if (!$this->full_calendar)
			$output .= "<caption>" . ucfirst(strftime("%B %Y", $month_start_date)) . "</caption>\n";
		
		$col = '';
		$th = '';
		$events = '';
		if ($this->full_calendar)
			$th .= '<tr>
    	<td colspan="7" style="border-right:none;">
        	<div class="calendar-heading">
            	<table>
				<tr>
                	<td class="calendar_cycle" ><a href="'.$extra['current_link'].'?date='.date("Y-m", $this->last_year).'"><span>&laquo;</span> '.strftime("%B %Y", $this->last_year).'</a></td>

                <td class="calendar_cycle current_month" >'.strftime("%B %Y", strtotime($this->date)).'</td>
                <td class="calendar_cycle" ><a href="'.$extra['current_link'].'?date='.date("Y-m", $this->next_year).'"> '.strftime("%B %Y", $this->next_year).' <span>&raquo;</span></a></td></tr></table>
            </div>
        </td>
        <td rowspan="2" class="week-number">&nbsp;</td>
    </tr>';
		for( $i=1,$j=$this->week_start,$t=(3+$this->week_start)*86400; $i<=7; $i++,$j++,$t+=86400 )
		{
 		  $localized_day_name = gmstrftime('%a',$t);			
		  if ($this->full_calendar)
		     {
				 $th .= "\t<th class=\"normal-day-heading\"><div class=\"day-number\" style=\"color:#fff; font-weight:bold\">" . ucfirst($localized_day_name) ."</div></th>\n";
			 }
		  else
		  	{
				$col .= "<col class=\"" . strtolower($localized_day_name) ."\" />\n";
				$th .= "\t<th title=\"" . ucfirst($localized_day_name) ."\">" . strtoupper($localized_day_name{0}) ."</th>\n";
			}
			$j = ( $j == 7 )? 0 : $j;			
		}
		
		//------------------------------------------------------- markup columns
		$output .= $col;
		
		//----------------------------------------------------------- table head
		$output .= "<thead>\n";
		$output .= "<tr>\n";
		
		$output .= $th;
		
		$output .= "</tr>\n";
		$output .= "</thead>\n";
		
		//---------------------------------------------------------- start tbody
		$output .= "<tbody>\n";
		$output .= "<tr>\n";
		
		//---------------------------------------------- initialize week counter
		$weeks = 1;
		
		//--------------------------------------------------- pad start of month
		
		//------------------------------------ adjust for week start on saturday
		for($i=1;$i<=$prepend;$i++)
		{
			if ($this->full_calendar)
				$output .= "\t<td class=\"day-without-date week-start no-events\" ><div class=\"day-number\">".gmstrftime("%B %Y", $this->last_year)."</div></td>";
			else
				$output .= "\t<td class=\"pad\">&nbsp;</td>\n";
		}
		//--------------------------------------------------- loop days of month
		for($day=1,$cell=$prepend+1; $day<=$days_in_month; $day++,$cell++){
			$today_class = '';
			$weekend_class = '';
			/*
			if this is first cell and not also the first day, end previous row
			*/
			if( $cell == 1 && $day != 1 ){
				$output .= "<tr>\n";
			}
			
			//-------------- zero pad day and create date string for comparisons
			$day = str_pad($day, 2, '0', STR_PAD_LEFT);
			$day_date = $year . "-" . $month . "-" . $day;
			$day_date_time = strtotime($day_date);
			$weekend = date("w", $day_date_time) == 0 || date("w", $day_date_time) == 6;
			$week_year = date("W", $day_date_time);

			//-------------------------- compare day and add classes for matches
			if ($weekend){
				$weekend_class = 'weekend';
				$weekend = false;
			}
			if( $this->mark_today == TRUE && $day_date == date("Y-m-d") ){
				$classes[] = $this->today_date_class;
				$today_class = 'current-day';
			}
			
			if( $this->mark_selected == TRUE && $day_date == $this->date ){
				$classes[] = $this->selected_date_class;
			}
			
			if( $this->mark_passed == TRUE && $day_date < date("Y-m-d") ){
				$classes[] = $this->passed_date_class;
			}
			
			if( is_array($this->highlighted_dates) ){
				if( in_array($day_date, $this->highlighted_dates) ){
					$classes[] = $this->default_highlighted_class;
				}
			}
			if ($this->editor)
			  {
				 $this->editor_action = 'ondblclick="window.location.href=\'calendar?action=add_event&date='.$day_date.'\'" title="Double click to add an event on '.$day_date.'"';
				 $this->editor_class = 'clickable';
			  }			
			//----------------- loop matching class conditions, format as string
			if( isset($classes) ){
				$day_class = ' class="';
				foreach( $classes AS $value ){
					$day_class .= $value . " ";
				}
				$day_class = substr($day_class, 0, -1) . '"';
			} else {
				$day_class = '';
			}
			
			//---------------------------------- start table cell, apply classes
			// detect windows os and substitute for unsupported day of month modifer
			$title_format = (strtoupper(substr(PHP_OS, 0, 3)) == 'WIN')? "%A, %B %#d, %Y": "%A, %B %e, %Y";
			if ($this->show_events)
				$events = $this->event_list($day_date);
			$events_class = $events ? 'has-events' : 'no-events';
			if ($this->full_calendar)
				$output .= "\t<td class=\"day-with-date ".$events_class." ".$weekend_class." ".$today_class." ".$this->editor_class."\" ".$this->editor_action."><div class=\"day-number\">";			
			else
				$output .= "\t<td" . $day_class . " title=\"" . ucwords(strftime($title_format, strtotime($day_date))) . "\">";
			
			//----------------------------------------- unset to keep loop clean
			unset($day_class, $classes);
			
			//-------------------------------------- conditional, start link tag 
			switch( $this->link_days ){
				case 0 :
					$output .= $day;
				break;
				
				case 1 :
					if( empty($this->formatted_link_to) ){
						$output .= "<a href=\"" . $this->link_to . "?day=" . $day_date . "\">" . $day . "</a>";
					} else {
						$output .= "<a href=\"" . strftime($this->formatted_link_to, strtotime($day_date)) . "\">" . $day . "</a>";
					}
				break;
				
				case 2 :
					if( is_array($this->highlighted_dates) ){
						if( in_array($day_date, $this->highlighted_dates) ){
							if( empty($this->formatted_link_to) ){
								$output .= "<a href=\"" . $this->link_to . "?day=" . $day_date . "\">";
							} else {
								$output .= "<a href=\"" . strftime($this->formatted_link_to, strtotime($day_date)) . "\">";
							}
						}
					}
					
					$output .= $day;
					
					if( is_array($this->highlighted_dates) ){
						if( in_array($day_date, $this->highlighted_dates) ){
							if( empty($this->formatted_link_to) ){
								$output .= "</a>";
							} else {
								$output .= "</a>";
							}
						}
					}
				break;
			}
			//------------------------------------------------- close table cell
			$output .= $this->full_calendar ? "</div>".$events."</td>\n" : "</td>\n";
			
			//------- if this is the last cell, end the row and reset cell count
			if( $cell == 7 ){
				if ($this->full_calendar)
					$output .= "<td class=\"week-number\"><span>".$week_year."</span></td></tr>\n";
				else
					$output .= "</tr>\n";
				$cell = 0;
			}
			
		}
		
		//----------------------------------------------------- pad end of month
		if( $cell > 1 ){
			for($i=$cell;$i<=7;$i++)
			{
				if ($this->full_calendar)
					$output .= "\t<td class=\"day-without-date week-start no-events\"><div class=\"day-number\">".gmstrftime("%B %Y", $this->next_year)."</div></td>";
				else
					$output .= "\t<td class=\"pad\">&nbsp;</td>\n";
			}
		if ($this->full_calendar)
			$output .= "<td class=\"week-number\"><span>".$week_year."</span></td></tr>\n";
		else			
			$output .= "</tr>\n";
		}
		
		//--------------------------------------------- close last row and table
		$output .= "</tbody>\n";
		$output .= "</table>\n";
		
		//--------------------------------------------------------------- return
		return $output;
		
	}
	
}
?>