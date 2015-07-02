<?php 
const SHOWCASE_LIST_DESTINATION="./showcase-data/";
$arrayOfShowcaseFiles=scandir(SHOWCASE_LIST_DESTINATION);
rsort($arrayOfShowcaseFiles);
$delimiter=",";

if(isset($_POST["intake-showcase"])){
	$arrayOfShowcaseInfo=file(SHOWCASE_LIST_DESTINATION.$_POST["intake-showcase"]);
}else{
	$arrayOfShowcaseInfo=file(SHOWCASE_LIST_DESTINATION.$arrayOfShowcaseFiles[0]);
}
$arrayOfTitle=explode(",",$arrayOfShowcaseInfo[0]);


$pageTitle='TWD - Showcase '.$arrayOfTitle[0].' '.$arrayOfTitle[1];
$pageClass='pg-showcase';
include('templates/header.php');
?>
<main>
	<section>
		<div class="page-title pick-intake">
			<div>
				<h1>Student Project Showcase</h1>
				<form action="showcase.php" method="post">
					<select name="intake-showcase" onchange="this.form.submit()">
						<option value selected>Pick Intake</option>
						<?php
if(is_dir(SHOWCASE_LIST_DESTINATION)){
	foreach($arrayOfShowcaseFiles as $oneFile){
		if(is_file(SHOWCASE_LIST_DESTINATION.$oneFile)){
			$arrayOfShowcases=file(SHOWCASE_LIST_DESTINATION.$oneFile);
			$arrayOfItems=explode($delimiter,$arrayOfShowcases[0]);
			echo "<option value='".$oneFile."'>".$arrayOfItems[0]." ".$arrayOfItems[1]."</option>";
		}
	}
}
			?>
						<!--<option>2014 Winter</option>
						<option>2013 Fall</option>
						<option>2013 Summer</option>-->
					</select>
					<noscript><input type="submit" value="Submit"></noscript>
				</form>
			</div>
        </div>
		
		<div class="sidebar">
        	<ul>
                <li><a href="#html-css">HTML-CSS</a></li>
                <li><a href="#jscript-jquery">JAVA - JQUERY</a></li>
                <li><a href="#responsive">MOBILE RESPONSIVE BLOG</a></li>
                <li><a href="#php">PHP</a></li>
                <li><a href="#wordpress">WORDPRESS</a></li>
                <li><a href="#internal">INTERNAL CLIENT PROJECT</a></li>
                <li><a href="#external">EXTERNAL CLIENT PROJECT</a></li>
                <li><a href="#portfolio">PORTFOLIO SITE</a></li>
            </ul>
			<button><img src="images/2015twd-compass-website-icon-SideBar-Mobile(vertical)title-01.png"><img src="images/2015twd-compass-website-icon-SideBar-Mobile(vertical)arrow-01.png"></button>
		</div>
		
		<div>
			<div class="showcase-slideshow">
				<div class="laptop_screen">
					<div class="browser_screen">
					<?php
					$counter=0;
					foreach($arrayOfShowcaseInfo as $eachImage){
						$arrayOfInfo=explode($delimiter,$eachImage);
						if($counter==0){
							echo "<div id='".$arrayOfInfo[3]."'>";
						}
						echo "<a href='".$arrayOfInfo[4]."'>";
						echo "<img src='images/showcase/".$arrayOfInfo[2].'/'.$arrayOfInfo[3].'/'.$arrayOfInfo[5]."' alt='".$arrayOfInfo[8]." Website, ".$arrayOfInfo[6].", By ".$arrayOfInfo[7]."' />";
						echo "</a>";
						$counter++;
						if($counter==7){
							echo "</div>";
							$counter=0;
						}
					}
					?>
					</div>
				</div>
				<button id="prevShow" class="prevSlide arrow button left"><span>Prev</span></button>
				<button id="nextShow" class="nextSlide arrow button right"><span>Next</span></button>
				
			</div>
			<div class="slideshow-description">
				<div class="display-title">
					<h1></h1>
					<h2></h2>
				</div>
				<div class="description">
					<p></p>
					<p>(Click the screenshot to go to the page)</p>
				</div>
			</div>
		</div>
		
	</section>
</main>
<?php 
include('templates/footer.inc');
?>