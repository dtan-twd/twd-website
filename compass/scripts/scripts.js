// JavaScript Document

// jQuery behaviour when hovering over footer
var $footerActivated=false;
if($(window).width()>1025 && $(window).height()>769){
	$('footer').click(function(){
		$('footer').toggleClass('hovered');
		if($footerActivated==false){
			$footerActivated=true;
			$('<div class="blur-overlay"></div>').css({
				'background':'#000', // color of the background
				'position':'fixed', // don't change line 8~14 (until z-index rule) 
				'top': '0%',
				'left': '0%',
				'width': '100%',
				'height': '100%',
				'opacity': 0,
				'z-index': 1 // end of blur-overlay css rules
			}).animate({
				'opacity': 0.6 // change this value in order to increase/decrease the opacity of blur-overlay background color
			},'slow').appendTo('body').click(function(){
				$('footer').removeClass('hovered');
				$footerActivated=false;
				$('.blur-overlay').fadeOut('slow',function(){
					$('.blur-overlay').remove();
				});
			});
		}else{
			$('footer').removeClass('hovered');
			$footerActivated=false;
			$('.blur-overlay').fadeOut('slow',function(){
				$('.blur-overlay').remove();
			});
		}
	});
}
// End of footer hovering behaviour



// Mobile Nav Section
var $showMobileMenu=$('#show-mobile');
var mobileMenuClickCounter=0;

$showMobileMenu.click(function(){
	mobileMenuClickCounter++;
	$('nav').toggleClass('displayMobileMenu');
	if(mobileMenuClickCounter%2==0){
		$('.opaque-overlay').fadeOut('slow',function(){
			$('.opaque-overlay').remove();
		});
	}else{
		$('<div class="opaque-overlay"></div>').css({
			'background':'#000', // color of the background
			'position':'fixed', // don't change line 186~192 (until z-index rule)
			'top': '0%',
			'left': '0%',
			'width': '100%',
			'height': '100%',
			'opacity': 0,
			'z-index': 1 // end of blur-overlay css rules
		}).animate({'opacity': 0.6},'slow').appendTo('body'); // change this value in order to increase/decrease the opacity of blur-overlay background color
	}
});
// End of Mobile Nav Section



// Front page slideshow behaviour
var $slideshows=$('.pg-home .browser_screen img');
var imageWidth=$('.pg-home .browser_screen img:first').width();// please make the slideshow image 584px by 320px
var entireWidth;
var $firstImage=$('.pg-home .browser_screen img:first');
var $lastImage=$('.pg-home .browser_screen img:last');

var $prevButton=$('#prevButton');
var $nextButton=$('#nextButton');

var animating=false;
var firstlastSwap=false;

var arrayOfDescription=[];
var slideshowButtonCounter=0;

$slideshows.each(function(i){
	leftPosition=i*imageWidth;
	$(this).css('left',leftPosition);
	entireWidth=leftPosition;
	$slideshowDescription=$(this).attr('alt');
	arrayOfDescription.push($slideshowDescription);
});

var $descriptionTarget=$('.pg-home .laptop_screen').next('p');
$descriptionTarget.text(arrayOfDescription[0]);

var firstImagePosition=$firstImage.css('left');
var lastImagePosition=$lastImage.css('left');
var currentImagePosition='0px';

var descriptionArrayLength=arrayOfDescription.length;
var prevClick=false;
var nextClick=false;

$prevButton.click(function(){
	prevClick=true;
	if(firstImagePosition==currentImagePosition){
		firstlastSwap=true;
		changeSlide('-',lastImagePosition);
	}else{
		firstlastSwap=false;
		changeSlide('+',firstImagePosition);
	}
});

$nextButton.click(function(){
	nextClick=true;
	if(lastImagePosition==currentImagePosition){
		firstlastSwap=true;
		changeSlide('+',firstImagePosition);
	}else{
		firstlastSwap=false;
		changeSlide('-',lastImagePosition);
	}
});

function changeSlide(plusMinus,imagePosition){
	if(animating==false){
		if(imagePosition!='0px'){
			animating=true;
			if(firstlastSwap==true){
				movingDistance=entireWidth;
			}else{
				movingDistance=imageWidth;
			}
			if(prevClick==true){
				if(firstImagePosition==currentImagePosition){
					slideshowButtonCounter=descriptionArrayLength-1;
				}else{
					slideshowButtonCounter--;
				}
			}
			if(nextClick==true){
				if(lastImagePosition==currentImagePosition){
					slideshowButtonCounter=0;
				}else{
					slideshowButtonCounter++;
				}
			}
			
			$descriptionTarget.text(arrayOfDescription[slideshowButtonCounter]);
			$slideshows.animate({'left':plusMinus+'='+movingDistance},function(){
				firstImagePosition=$firstImage.css('left');
				lastImagePosition=$lastImage.css('left');
				prevClick=false;
				nextClick=false;
				animating=false;
			});
		}
	}
}
// End of slideshow behaviour



// Sidebar
var $menuLinks=$('.sidebar > ul > li > a');
$menuLinks.click(function(){
	
	$(this).parent('li').siblings('li').children('ul').removeClass('submenuOpen');
	$(this).parent('li').children('ul').toggleClass('submenuOpen');
});

var $sideButton=$('.sidebar > button');
$sideButton.click(function(){
	$(this).parent('div').toggleClass('opened');
	$(this).parent('div').siblings('div:last-child').toggleClass('slideRight');
});
// End of Sidebar

	

// Course, Schedule, Students, and Contact Page behaviour
var $mainContent=$('.pg-course, .pg-students, .pg-resources ,.pg-contact').find('section > div:last-child > div');
$mainContent.not('div:first-of-type').hide();

var $sidebar=$('div.sidebar a');
$sidebar.click(function(evt){
	var targetID=$(this).attr('href');
	$(targetID).siblings('div').hide();
	$(targetID).show();
	evt.preventDefault();
	if($(window).width()<710){
		$exception=$(this).attr('id');
		if($exception!='links-sidemenu' && $exception!='server-sidemenu'){
			$(this).parents('div.sidebar').removeClass('opened');
			$(this).parents('div.sidebar').siblings('div:last-child').removeClass('slideRight');
		}
	}
});

var $serverMenu=$('div.sidebar > ul > li:last-child > a');
$serverMenu.click(function(){
	var targetID=$(this).attr('href');
	$(targetID).children('div').children('div').not('div:first-child').hide();
	$(targetID).children('div').children('div:first-child').show();
});
// End of above page behaviour



// Schedule Page behaviour
var $scheduleList=$('.pg-schedule section > .desktop-calendar > div');
var $mobileScheduleList=$('.pg-schedule section > .mobile-calendar > div');
$scheduleList.hide();
$mobileScheduleList.hide();

var date=new Date();
var todayMonth=date.getMonth();
var todayYear=date.getFullYear();
if(todayMonth==0){
	todayMonth='january';
}else if(todayMonth==1){
	todayMonth='february';
}else if(todayMonth==2){
	todayMonth='march';
}else if(todayMonth==3){
	todayMonth='april';
}else if(todayMonth==4){
	todayMonth='may';
}else if(todayMonth==5){
	todayMonth='june';
}else if(todayMonth==6){
	todayMonth='july';
}else if(todayMonth==7){
	todayMonth='august';
}else if(todayMonth==8){
	todayMonth='september';
}else if(todayMonth==9){
	todayMonth='october';
}else if(todayMonth==10){
	todayMonth='november';
}else{
	todayMonth='december';
}
var today=todayMonth+"-"+todayYear;
var todayFound=false;
var mobileTodayFound=false;

$scheduleList.each(function(){
	var eachMonth=$(this).attr('id');
	if(today==eachMonth){
		$('div#'+eachMonth).show();
		todayFound=true;
	}
});

var mobileToday="m-"+todayMonth+"-"+todayYear;

$mobileScheduleList.each(function(){
	var eachMonth=$(this).attr('id');
	if(mobileToday==eachMonth){
		$('div#'+eachMonth).show();
		mobileTodayFound=true;
	} 
});

if(todayFound==false || mobileTodayFound==false){
	$scheduleList.siblings('div:first-of-type').show();
	$mobileScheduleList.siblings('div:first-of-type').show();
}
// End of schedule page behaviour



// Showcase Behaviour
var $showPage=$('.pg-showcase .browser_screen > div');
$showPage.not('div:first-child').hide();
var $showSlideshows=$('.pg-showcase .browser_screen > div:first-child img');

var showImageWidth=$('.pg-showcase .browser_screen img:first').width();// please make the slideshow image 584px by 320px
var showEntireWidth;
var $showFirstImage=$('.pg-showcase .browser_screen > div:first-child img:first');
var $showLastImage=$('.pg-showcase .browser_screen > div:first-child img:last');

var $prevShow=$('#prevShow');
var $nextShow=$('#nextShow');

var showAnimating=false;
var showFirstlastSwap=false;

var showArrayOfDescription=[];
var showButtonCounter=0;

$showSlideshows.each(function(i){
	leftPosition=i*showImageWidth;
	$(this).css('left',leftPosition);
	showEntireWidth=leftPosition;
	$showDescription=$(this).attr('alt');
	showArrayOfDescription.push($showDescription);
});

var $brokenDescription=showArrayOfDescription[0].split(",");
var $siteNameTarget=$('.pg-showcase .slideshow-description h1');
var $studentNameTarget=$('.pg-showcase .slideshow-description h2');
var $projectDescriptionTarget=$('.pg-showcase .slideshow-description p:first-child');
$siteNameTarget.text($brokenDescription[1]);
$studentNameTarget.text($brokenDescription[2]);
$projectDescriptionTarget.text($brokenDescription[0]);

var showFirstImagePosition=$showFirstImage.css('left');
var showLastImagePosition=$showLastImage.css('left');
var currentImagePosition='0px';

var showDescriptionArrayLength=showArrayOfDescription.length;
var showPrevClick=false;
var showNextClick=false;

$prevShow.click(function(){
	showPrevClick=true;
	if(showFirstImagePosition==currentImagePosition){
		showFirstlastSwap=true;
		showChangeSlide('-',showLastImagePosition);
	}else{
		showFirstlastSwap=false;
		showChangeSlide('+',showFirstImagePosition);
	}
});

$nextShow.click(function(){
	showNextClick=true;
	if(showLastImagePosition==currentImagePosition){
		showFirstlastSwap=true;
		showChangeSlide('+',showFirstImagePosition);
	}else{
		showFirstlastSwap=false;
		showChangeSlide('-',showLastImagePosition);
	}
});

var $showSidebar=$('.pg-showcase .sidebar a');
$showSidebar.click(function(evt){
	showArrayOfDescription.length=0;
	var targetID=$(this).attr('href');
	$showSlideshows=$(targetID).children('a').children('img');
	$showFirstImage=$(targetID).children('a:first-child').children('img');
	$showLastImage=$(targetID).children('a:last-child').children('img');
	$showSlideshows.each(function(i){
		leftPosition=i*showImageWidth;
		$(this).css('left',leftPosition);
		showEntireWidth=leftPosition;
		$showDescription=$(this).attr('alt');
		showArrayOfDescription.push($showDescription);
	});
	showFirstImagePosition=$showFirstImage.css('left');
	showLastImagePosition=$showLastImage.css('left');
	$brokenDescription=showArrayOfDescription[0].split(",");
	$siteNameTarget.text($brokenDescription[1]);
	$studentNameTarget.text($brokenDescription[2]);
	$projectDescriptionTarget.text($brokenDescription[0]);
});

function showChangeSlide(plusMinus,imagePosition){
	if(showAnimating==false){
		if(imagePosition!='0px'){
			showAnimating=true;
			if(showFirstlastSwap==true){
				movingDistance=showEntireWidth;
			}else{
				movingDistance=showImageWidth;
			}
			if(showPrevClick==true){
				if(showFirstImagePosition==currentImagePosition){
					showButtonCounter=showDescriptionArrayLength-1;
				}else{
					showButtonCounter--;
				}
			}
			if(showNextClick==true){
				if(showLastImagePosition==currentImagePosition){
					showButtonCounter=0;
				}else{
					showButtonCounter++;
				}
			}
			$brokenDescription=showArrayOfDescription[showButtonCounter].split(",")
			$siteNameTarget.text($brokenDescription[1]);
			$studentNameTarget.text($brokenDescription[2]);
			$projectDescriptionTarget.text($brokenDescription[0]);
			$showSlideshows.animate({'left':plusMinus+'='+movingDistance},function(){
				showFirstImagePosition=$showFirstImage.css('left');
				showLastImagePosition=$showLastImage.css('left');
				showPrevClick=false;
				showNextClick=false;
				showAnimating=false;
			});
		}
	}
}
// End of showcase behaviour