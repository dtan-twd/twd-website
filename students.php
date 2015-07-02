<?php 
const STUDENT_LIST_DESTINATION="./student-data/";
$arrayOfStudentFiles=scandir(STUDENT_LIST_DESTINATION);
rsort($arrayOfStudentFiles);

if(isset($_POST["intake-student"])){
	$arrayOfStudentInfo=file(STUDENT_LIST_DESTINATION.$_POST["intake-student"]);
}else{
	$arrayOfStudentInfo=file(STUDENT_LIST_DESTINATION.$arrayOfStudentFiles[0]);
}
$arrayOfTitle=explode(",",$arrayOfStudentInfo[0]);

$pageTitle='TWD - Students '.$arrayOfTitle[0].' '.$arrayOfTitle[1];
$pageClass='pg-students';
include('templates/header.php');
?>
<main>
	<section>
		<div class="page-title pick-intake">
			<div>
				<h1>Student list & Contact information</h1>
			<?php
			
if(is_dir(STUDENT_LIST_DESTINATION)){
?>
				<form action="students.php" method="post">
					<select name="intake-student" onchange="this.form.submit()">
						<option value selected>Pick Intake</option>
<?php
	foreach($arrayOfStudentFiles as $oneFile){
		if(is_file(STUDENT_LIST_DESTINATION.$oneFile)){
			$arrayOfStudents=file(STUDENT_LIST_DESTINATION.$oneFile);
			$delimiter=",";
			$arrayOfItems=explode($delimiter,$arrayOfStudents[0]);
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
	
		<div class="sidebar">
<?php
function lengthNameSort($nameOfArray){
	$arrayOfLastNames=array();
	foreach($nameOfArray as $oneItem){
		$arrayOfInformation=explode(",",$oneItem);
		array_push($arrayOfLastNames, $arrayOfInformation[4]);
	}
	
	$totalNumber=count($arrayOfLastNames);
	if(count($arrayOfLastNames)%3==2){
		$eachSectionContains=ceil($totalNumber/3);
	}else{
		$eachSectionContains=floor($totalNumber/3);
	}

	$firstSection=array();
	$secondSection=array();
	$lastSection=array();
	$counter=0;
	
	foreach($arrayOfLastNames as $oneName){
		$counter++;
		$firstLetter=substr($oneName,0,1);
		if($counter<=$eachSectionContains){
			array_push($firstSection,$firstLetter);
		}else if($counter<=($eachSectionContains*2)){
			array_push($secondSection,$firstLetter);
		}else{
			array_push($lastSection,$firstLetter);
		}
	}
	$lengthFirst=count($firstSection);
	$lengthSecond=count($secondSection);
	$lengthLast=count($lastSection);
	
	if($firstSection[$lengthFirst-1]==$secondSection[0] || $secondSection[$lengthSecond-1]==$lastSection[0]){
		if($firstSection[$lengthFirst-1]==$secondSection[0]){
			$newLengthFirst=$lengthFirst+1;
			if($firstSection[$lengthFirst-1]==$secondSection[1]){
				$newLengthFirst=$lengthFirst-1;
			}
			if($firstSection[$lengthFirst-2]==$secondSection[1]){
				$newLengthFirst=$lengthFirst+1;
			}
		}else{
			$newLengthFirst=$lengthFirst;
		}
		
		if($secondSection[$lengthSecond-1]==$lastSection[0]){
			$newLengthLast=$lengthLast+1;
			if($secondSection[$lengthSecond-2]==$lastSection[0]){
				$newLengthLast=$lengthLast-1;
			}
			if($secondSection[$lengthSecond-2]==$lastSection[1]){
				$newLengthLast=$lengthLast+1;
			}
		}else{
			$newLengthLast=$lengthLast;
		}
		$newLengthSecond=$totalNumber-$newLengthFirst-$newLengthLast;
	}else{
		$newLengthFirst=$lengthFirst;
		$newLengthSecond=$lengthSecond;
		$newLengthLast=$lengthLast;
	}
	
	$arrayOfLength=array($newLengthFirst,$newLengthSecond,$newLengthLast);
	return $arrayOfLength;
}

$resultLength=lengthNameSort($arrayOfStudentInfo);
$arrayOfLastNames=array();
foreach($arrayOfStudentInfo as $oneItem){
	$arrayOfInformation=explode(",",$oneItem);
	array_push($arrayOfLastNames, $arrayOfInformation[4]);
}

$firstLastLetter=substr($arrayOfLastNames[$resultLength[0]-1],0,1);
$secondFirstLetter=substr($arrayOfLastNames[$resultLength[0]],0,1);
$secondLastLetter=substr($arrayOfLastNames[$resultLength[0]+$resultLength[1]-1],0,1);
$lastFirstLetter=substr($arrayOfLastNames[$resultLength[0]+$resultLength[1]],0,1);

$firstRange="a-".lcfirst($firstLastLetter);
$secondRange=lcfirst($secondFirstLetter)."-".lcfirst($secondLastLetter);
$lastRange=lcfirst($lastFirstLetter)."-z";

echo "<ul>";
echo "<li><a href='#".$firstRange."'>A - ".$firstLastLetter."</a></li>";
echo "<li><a href='#".$secondRange."'>".$secondFirstLetter." - ".$secondLastLetter."</a></li>";
echo "<li><a href='#".$lastRange."'>".$lastFirstLetter."- Z</a></li>";
echo "</ul>";
?>
			<button><img src='images/2015twd-compass-website-icon-SideBar-Mobile(vertical)title-01.png'><img src='images/2015twd-compass-website-icon-SideBar-Mobile(vertical)arrow-01.png'></button>
		</div>
			
		<div>
<?php
$nameCounter=0;
foreach($arrayOfStudentInfo as $oneStudent){
	$nameCounter++;
	$arrayOfInfo=explode($delimiter,$oneStudent);
	
	if($nameCounter==1){
		echo "<div id=".$firstRange.">";
	}else if($nameCounter==($resultLength[0]+1)){
		echo "<div id=".$secondRange.">";
	}else if($nameCounter==($resultLength[0]+$resultLength[1]+1)){
		echo "<div id=".$lastRange.">";
	}
	echo "<div>";
	echo "<h3>".$arrayOfInfo[3]." ".$arrayOfInfo[4]."</h3>";
	echo "<ul>";
	echo "<li><a href='".$arrayOfInfo[5]."'>Project Archive</a></li>";
	echo "<li><a href='".$arrayOfInfo[6]."'>Portfolio Site</a></li>";
	echo "</ul>";
	echo "<a href='mailto:".$arrayOfInfo[7]."'>".$arrayOfInfo[7]."</a>";
	echo "</div>";

	if($nameCounter==$resultLength[0]){
		echo "</div>";
	}else if($nameCounter==($resultLength[0]+$resultLength[1])){
		echo "</div>";
	}else if($nameCounter==($resultLength[0]+$resultLength[1]+$resultLength[2])){
		echo "</div>";
	}
}
?>				
		</div>

	</section>
</main>
<?php 
include('templates/footer.inc');
?>