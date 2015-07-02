<?php 
$pageTitle='BCIT Technical Web Design Program';
$pageClass='pg-home';
include('templates/header.php');
?>
<main>
	<section>
		<article>
			<div class="welcome-message">
				<h1>Welcome to our programs website</h1>
			</div>
			<div class="slideshow">
				<div class="laptop_screen">
					<div class="browser_screen">
						<a href="http://dtan.htpwebdesign.ca/"><img src="images/sample01.jpg" alt="HTML/CSS Level 3 Website, Paris, By Danny Tan"></a>
						<a href="http://sdumontaubrey.htpwebdesign.ca/"><img src="images/sample02.jpg" alt="HTML/CSS Level 1 Website, United States, By Scarlett Dumont-Aubrey"></a>
						<a href="http://tlee.htpwebdesign.ca/"><img src="images/sample03.jpg" alt="Javascript/jQuery Level 2, Random Number Generator, By Taylor Lee"></a>
						<a href="http://fng.htpwebdesign.ca/"><img src="images/sample04.jpg"alt="Javascript/jQuery Level 2, jQuery Tutorial, By Florence Ng"></a>
					</div>
				</div>
				<p></p>
				<button id="prevButton" class="arrow left">Prev</button>
				<button id="nextButton" class="arrow right">Next</button>
			</div>
			<div class="program-description">
				<div class="display-title">
					<h1>Some Title</h1>
                    <h2>Program Mission</h2>
				</div>
				<div class="description">
					<p>Phasellus aliquam cursus turpis imperdiet interdum. Praesent id ipsum gravida, sollicitudin lorem facilisis, luctus leo. Integer efficitur fermentum nisi, ac aliquet orci auctor non. Vestibulum aliquam orci ut tristique finibus. Morbi id nisl convallis, suscipit lacus vitae, accumsan nisl. Sed ex erat, semper vitae nibh sit amet, auctor bibendum justo. Vivamus nec ante velit. Suspendisse imperdiet, libero vel faucibus vestibulum, felis tortor placerat felis, nec mattis metus urna vitae diam. Nullam auctor accumsan ullamcorper. In sagittis consectetur risus, tincidunt porta felis porttitor in. Integer mollis neque vel diam tincidunt euismod. Aenean ac lectus in elit rhoncus lacinia ut in mauris. Cras hendrerit augue non magna egestas semper. Ut egestas sit amet sapien eu facilisis. Duis sed consectetur ipsum. Suspendisse potenti</p>
				</div>
			</div>
		</article>
	</section>
</main>
<?php 
include('templates/footer.inc');
?>