<?php 
$pageTitle='BCIT Technical Web Design Program';
$pageClass='pg-home';
include('templates/header.php');
?>
<main>
	<section>
		<div class="welcome-message">
			<div>
				<h1>Welcome to our programs website</h1>
			</div>
		</div>
		
		<div class="slideshow">
			<div class="laptop_screen">
				<div class="browser_screen">
				<!-- please make the slideshow images 584px by 320px -->
					<a href="http://dtan.htpwebdesign.ca/"><img src="images/sample01.jpg" alt="HTML/CSS Level 3 Website, Paris, By Danny Tan"></a>
					<a href="http://sdumontaubrey.htpwebdesign.ca/"><img src="images/sample02.jpg" alt="HTML/CSS Level 1 Website, United States, By Scarlett Dumont-Aubrey"></a>
					<a href="http://tlee.htpwebdesign.ca/"><img src="images/sample03.jpg" alt="Javascript/jQuery Level 2, Random Number Generator, By Taylor Lee"></a>
					<a href="http://fng.htpwebdesign.ca/"><img src="images/sample04.jpg"alt="Javascript/jQuery Level 2, jQuery Tutorial, By Florence Ng"></a>
				</div>
			</div>
			<p></p>
			<button id="prevButton" class="arrow button left"><span>Prev</span></button>
			<button id="nextButton" class="arrow button right"><span>Next</span></button>
		</div>
		
		<div class="program-description">
			<div class="display-title">
				<h2>Technical Web Designer</h2>
                <h3>Advance your web design skill set and qualify to industry standards</h3>
			</div>
			<div class="description">
				<p>The TWD program is a hands-on program combining current web design technologies with challenging assignments, structured projects, and industry experience.<p>
				<p>You will learn techniques in application development, be exposed to several current web technologies, and apply system development best practices to design and develop usable, effective web applications and web sites.</p>
			</div>
		</div>
	</section>
</main>
<?php 
include('templates/footer.inc');
?>