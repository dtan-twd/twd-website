<?php 
const SCHEDULE_LIST_DESTINATION="./schedule-data/";
$arrayOfScheduleFiles=scandir(SCHEDULE_LIST_DESTINATION);
rsort($arrayOfScheduleFiles);
$delimiter=",";

if(isset($_POST["intake-schedule"])){
	$arrayOfScheduleInfo=file(SCHEDULE_LIST_DESTINATION.$_POST["intake-schedule"]);
}else{
	$arrayOfScheduleInfo=file(SCHEDULE_LIST_DESTINATION.$arrayOfScheduleFiles[0]);
}
$arrayOfTitle=explode(",",$arrayOfScheduleInfo[0]);

$pageTitle='TWD - Schedule '.$arrayOfTitle[0].' '.$arrayOfTitle[1];
$pageClass='pg-schedule';
include('templates/header.php');
?>
<main>
	<section>
		<div class="page-title pick-intake">
			<div>
			<?php
			echo "<h1>Schedule - ".$arrayOfTitle[2]."</h1>";
if(is_dir(SCHEDULE_LIST_DESTINATION)){
?>
				<form action="schedule.php" method="post">
					<select name="intake-schedule" onchange="this.form.submit()">
						<option value selected>Pick Intake</option>
<?php
	foreach($arrayOfScheduleFiles as $oneFile){
		if(is_file(SCHEDULE_LIST_DESTINATION.$oneFile)){
			$arrayOfSchedules=file(SCHEDULE_LIST_DESTINATION.$oneFile);
			$arrayOfItems=explode($delimiter,$arrayOfSchedules[0]);
			echo "<option value='".$oneFile."'>".$arrayOfItems[0]." ".$arrayOfItems[1]."</option>";
		}
	}
}
			?>
					</select>
					<noscript><input type="submit" value="Submit"></noscript>
				</form>
			</div>
		</div>
		
<?php
$firstIndex=$arrayOfScheduleInfo[0];
$arrayOfFirstIndex=explode($delimiter,$firstIndex);

$firstMonth=$arrayOfFirstIndex[3]." ".$arrayOfFirstIndex[0];
$arrayOfMonth[$firstMonth]=array();
$newMonthArrayCreated=true;
$prevMonth=$firstMonth;

foreach($arrayOfScheduleInfo as $eachItem){
	if($newMonthArrayCreated==true){
		$needNewMonth=false;
	}
	$arrayOfInfo=explode($delimiter,$eachItem);
	$nameOfMonth=$arrayOfInfo[3]." ".$arrayOfInfo[0];
	if($nameOfMonth==$firstMonth){
		array_push($arrayOfMonth[$firstMonth],$eachItem);
		$prevMonth=$arrayOfInfo[3]." ".$arrayOfInfo[0];
	}else{
		if($nameOfMonth!=$prevMonth){
			$needNewMonth=true;
			$newMonthArrayCreated=false;
		}
	}
	if($needNewMonth==true){
		$arrayOfMonth[$nameOfMonth]=array();
		$newMonthArrayCreated=true;
		$needNewMonth=false;
	}
	if($nameOfMonth!=$firstMonth && $needNewMonth==false){
		array_push($arrayOfMonth[$nameOfMonth],$eachItem);
	}
	$prevMonth=$arrayOfInfo[3]." ".$arrayOfInfo[0];
}

/* credit goes to http://davidwalsh.name/demo/php-calendar.php */
/* draws a calendar */
function draw_calendar($month,$year,$arrayOfData){
	/* draw table */
	$calendar = '<table cellpadding="0" cellspacing="0" class="calendar">';
	
	$matchingMonth=date('F',mktime(0,0,0,$month));
	$arrayOfMonthInfo=array();
	
	foreach($arrayOfData as $oneMonth){
		$arrayOfEachMonth=explode(",",$oneMonth);
		$nameOfMonth=$arrayOfEachMonth[3];
		if($nameOfMonth==$matchingMonth){
			array_push($arrayOfMonthInfo,$oneMonth);
		}
	}

	/* table headings */
	$headings = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
	$calendar.= '<tr class="calendar-row"><td class="calendar-day-head">'.implode('</td><td class="calendar-day-head">',$headings).'</td></tr>';

	/* days and weeks vars now ... */
	$running_day = date('w',mktime(0,0,0,$month,1,$year));
	$days_in_month = date('t',mktime(0,0,0,$month,1,$year));
	$days_in_this_week = 1;
	$day_counter = 0;
	$dates_array = array();

	/* row for week one */
	$calendar.= '<tr class="calendar-row">';

	/* print "blank" days until the first of the current week */
	for($x = 0; $x < $running_day; $x++){
		$calendar.= '<td class="calendar-day-np"> </td>';
		$days_in_this_week++;
	}

	/* keep going with days.... */
	for($list_day = 1; $list_day <= $days_in_month; $list_day++){
		$calendar.= '<td class="calendar-day">';
			/* add in the day number */
			$calendar.= '<div class="day-number">'.$list_day.'</div>';

			/** QUERY THE DATABASE FOR AN ENTRY FOR THIS DAY !!  IF MATCHES FOUND, PRINT THEM !! **/
			foreach($arrayOfMonthInfo as $eachDay){
				$arrayOfInfo=explode(",",$eachDay);
				if($arrayOfInfo[5]==$list_day){
					$calendar.= str_repeat("<p>".$arrayOfInfo[6]."</p>",1);
					$calendar.= str_repeat("<p>".$arrayOfInfo[7]."</p>",1);
				}
			}
			
		$calendar.= '</td>';
		if($running_day == 6){
			$calendar.= '</tr>';
			if(($day_counter+1) != $days_in_month){
				$calendar.= '<tr class="calendar-row">';
			}
			$running_day = -1;
			$days_in_this_week = 0;
		}
		$days_in_this_week++; $running_day++; $day_counter++;
	}

	/* finish the rest of the days in the week */
	if($days_in_this_week < 8){
		for($x = 1; $x <= (8 - $days_in_this_week); $x++){
			$calendar.= '<td class="calendar-day-np"> </td>';
		}
	}

	/* final row */
	$calendar.= '</tr>';

	/* end the table */
	$calendar.= '</table>';
	
	/* all done, return result */
	return $calendar;
}
echo "<div class='sidebar'>";
echo "<ul class='desktop-schedule'>";
foreach($arrayOfMonth as $nameOfMonth => $monthInfo){
	$scheduleDate=explode(" ",$nameOfMonth);
	$intakeMonth=strtolower($scheduleDate[0]);
	$intakeYear=$scheduleDate[1];
	echo "<li><a href='#".$intakeMonth."-".$intakeYear."'>".ucfirst($intakeMonth)."</a></li>";
}
echo "</ul>";
echo "<ul class='mobile-schedule'>";
foreach($arrayOfMonth as $nameOfMonth => $monthInfo){
	$scheduleDate=explode(" ",$nameOfMonth);
	$intakeMonth=strtolower($scheduleDate[0]);
	$intakeYear=$scheduleDate[1];
	echo "<li><a href='#m"."-".$intakeMonth."-".$intakeYear."'>".ucfirst($intakeMonth)."</a></li>";
}
echo "</ul>";
echo "<button><img src='images/2015twd-compass-website-icon-SideBar-Mobile(vertical)title-01.png'><img src='images/2015twd-compass-website-icon-SideBar-Mobile(vertical)arrow-01.png'></button>";
echo "</div>";

echo "<div class='desktop-calendar'>";
foreach($arrayOfMonth as $nameOfMonth => $monthInfo){
	$scheduleDate=explode(" ",$nameOfMonth);
	$intakeMonth=strtolower($scheduleDate[0]);
	$intakeYear=$scheduleDate[1];
	if($intakeMonth=="january"){
		$numMonth=1;
	}else if($intakeMonth=="february"){
		$numMonth=2;
	}else if($intakeMonth=="march"){
		$numMonth=3;
	}else if($intakeMonth=="april"){
		$numMonth=4;
	}else if($intakeMonth=="may"){
		$numMonth=5;
	}else if($intakeMonth=="june"){
		$numMonth=6;
	}else if($intakeMonth=="july"){
		$numMonth=7;
	}else if($intakeMonth=="august"){
		$numMonth=8;
	}else if($intakeMonth=="september"){
		$numMonth=9;
	}else if($intakeMonth=="october"){
		$numMonth=10;
	}else if($intakeMonth=="november"){
		$numMonth=11;
	}else{
		$numMonth=12;
	}
	echo "<div id='".$intakeMonth."-".$intakeYear."'>";
	echo "<h2>".ucfirst($intakeMonth)." ".$intakeYear."</h2>";
	echo "<div>";
	echo draw_calendar($numMonth,$intakeYear,$arrayOfScheduleInfo);
	echo "</div>";
	echo "</div>";
}
echo "</div>";

echo "<div class='mobile-calendar'>";
foreach($arrayOfMonth as $nameOfMonth => $monthInfo){
	$scheduleDate=explode(" ",$nameOfMonth);
	$intakeMonth=strtolower($scheduleDate[0]);
	$intakeYear=$scheduleDate[1];

	echo "<div id='m"."-".$intakeMonth."-".$intakeYear."'>";
	echo "<table>";
	echo "<thead>";
	echo "<tr>";
	echo "<th>Date</th>";
	echo "<th>Course Name</th>";
	echo "<th>Instructor</th>";
	echo "<th>Week #</th>";
	echo "</tr>";
	echo "</thead>";
	echo "<tbody>";
	foreach($monthInfo as $eachDay){
		$arrayOfInfo=explode(",",$eachDay);
		if(date("F")==$arrayOfInfo[3] && date("t")==$arrayOfInfo[5]){
			echo "<tr class='today'>";
		}else{
			echo "<tr>";
		}
		echo "<td>".substr($arrayOfInfo[3],0,3)." ".$arrayOfInfo[5]."</td>";
		echo "<td>".$arrayOfInfo[6]."<span>".$arrayOfInfo[7]."</span></td>";
		echo "<td>".$arrayOfInfo[9]."</td>";
		echo "<td>".$arrayOfInfo[4]."</td>";
		echo "</tr>";
	}
	echo "</tbody>";
	echo "</table>";
	echo "</div>";
}
echo "</div>";
?>
	</section>
</main>
<?php 
include('templates/footer.inc');
?>