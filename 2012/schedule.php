<?php include('perch/runtime.php');?>

<!DOCTYPE html>
<!-- /ht Paul Irish - http://front.ie/j5OMXi -->
<!--[if lt IE 7 ]> <html class="no-js ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="no-js ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="no-js ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<title>Schedule | The Theory of (R)Evolution - 28th September 2012</title>
<meta name="description" content="">
<meta name="author" content="">

<!-- /ht Andy Clarke - http://front.ie/lkCwyf -->
<meta http-equiv="cleartype" content="on">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  
<link rel="shortcut icon" href="http://2012.shropgeek-revolution.co.uk/favicon.png">
<link rel="apple-touch-icon" href="http://2012.shropgeek-revolution.co.uk/apple-touch-icon.png">

<!-- /ht Jeremy Keith - http://front.ie/mLXiaS -->
<link rel="stylesheet" href="http://2012.shropgeek-revolution.co.uk/css/global.css" media="all">
<link rel="stylesheet" href="http://2012.shropgeek-revolution.co.uk/css/layout.css" media="all and (min-width: 33.236em)">
<link rel="stylesheet" href="http://2012.shropgeek-revolution.co.uk/css/highdpi.css" media="screen and (-webkit-min-device-pixel-ratio: 2) ">
<!-- 30em + (1.618em * 2) = 33.236em / Eliminates potential of horizontal scrolling in most cases -->

<!--[if (lt IE 9) & (!IEMobile)]>
<link rel="stylesheet" href="http://2012.shropgeek-revolution.co.uk/css/layout.css" media="all">
<![endif]-->

<!--[if lt IE 9]>
<link rel="stylesheet" href="css/ie.css" media="all">
<![endif]-->

<script src="http://2012.shropgeek-revolution.co.uk/js/libs/modernizr-1.7.min.js"></script>
<!-- TYPEKIT -->
<script type="text/javascript" src="http://use.typekit.com/jnt0vsx.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-30752703-1']);
  _gaq.push(['_setDomainName', 'shropgeek-revolution.co.uk']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</head>

<body>
  
  
    
<?php include "navigation.php"; ?> 

   
    <div id="main" role="main">
    	<article class="site-container">
    	
    		<h1 class="major-title">Schedule</h1>
    		
    		<p class="intro">We believe that web conferences should be as much about meeting people as they are about the speakers so we've given you loads of time to socialise. Extra-long breaks mean you don't have to choose between a comfort break or a chat with a new friend. You're welcome.</p>
   		
    		<section class="schedule">
    			<div class="occurence">
    				<time datetime="">18:00</time>
    				<p>Doors open, drinks &amp; socialising</p>
    			</div>
    			<div class="occurence">
    				<time datetime="">18:30</time>
    				<p>Introductions</p>
    			</div>
    			<div class="occurence speaker1">
   				<?php // <time datetime="">18:45</time> ?>
                    <time datetime="">18:35</time>
    				<h2><a href="<?php perch_content('ScheduleUrl1');?>"><?php perch_content('ScheduleSpeaker1');?></a></h2>
    				<p class="talk-title"><?php perch_content('ScheduleTitle1');?><br />
                    <?php perch_content('ScheduleTitle1a');?></p>
    				<?php perch_content('ScheduleImage1');?>
    			</div>
                <?php /*
                <div class="occurence">
    				<time datetime="">19:05</time>
    				<p>Break</p>
    			</div>
				*/ ?>
                <div class="occurence speaker2">
    			<?php //	<time datetime="">19:35</time> ?>
                    <time datetime="">19:00</time>
    				<h2><a href="<?php perch_content('ScheduleUrl2');?>"><?php perch_content('ScheduleSpeaker2');?></a></h2>
    				<p class="talk-title"><?php perch_content('ScheduleTitle2');?><br />
                    <?php perch_content('ScheduleTitle12a');?></p>
    				<?php perch_content('ScheduleImage2');?>
    			</div>
    			<div class="occurence">
    			<?php //	<time datetime="">20:15</time> ?>
                    <time datetime="">19:45</time>
    				<p>Break</p>
    			</div>
    			<div class="occurence speaker2">
    			<?php //	<time datetime="">20:45</time> ?>
                	<time datetime="">20:45</time>
    				<h2><a href="<?php perch_content('ScheduleUrl3');?>"><?php perch_content('ScheduleSpeaker3');?></a></h2>
    				<p class="talk-title"><?php perch_content('ScheduleTitle3');?><br />
                    <?php perch_content('ScheduleTitle3a');?></p>
    				<?php perch_content('ScheduleImage3a');?>
    			</div>
                <?php /*
    			<div class="occurence">
    				<time datetime="">21.05</time>
    				<p>Break</p>
    			</div>
				*/ ?>
                <div class="occurence">
    				<time datetime="">21.15</time>
    				<p>Break</p>
    			</div>
    			<div class="occurence speaker3">
    			<?php /*	<time datetime="">21:35</time> */ ?>
                	<time datetime="">21:45</time>
    				<h2><a href="<?php perch_content('ScheduleUrl4');?>"><?php perch_content('ScheduleSpeaker4');?></a></h2>
    				<p class="talk-title"><?php perch_content('ScheduleTitle4');?><br />
                    <?php perch_content('ScheduleTitle4a');?></p>
    				<?php perch_content('ScheduleImage4');?>
    			</div>
    			<div class="occurence">
    				<time datetime="">22:30</time>
    				<p>Closing</p>
    			</div>
                <div class="occurence">
    				<time datetime="">22:35</time>
    				<p>End &amp; after party</p>
    			</div>
    		</section>
    	
    	</article>
   
    	
<?php include "sponsors.php"; ?>

</div> <!-- /main-->
    
<?php include "footer.php"; ?>
    


</body>

</html>