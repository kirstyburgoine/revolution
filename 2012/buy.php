<?php include('perch/runtime.php');?>

<!DOCTYPE html>
<!-- /ht Paul Irish - http://front.ie/j5OMXi -->
<!--[if lt IE 7 ]> <html class="no-js ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="no-js ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="no-js ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<title>Buy Tickets | The Theory of (R)Evolution - 28th September 2012</title>
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
    	
    		<h1 class="major-title">Tickets</h1>
    		
    		<section class="buy-call">
    			
    			<?php /* <a class="button fat-button" href="#"><b>Standard tickets</b> <i><span class="pound">£</span>25</i>Buy your ticket <span class="where">at EventBrite &raquo;</span></a>		
    			
    			<a class="button fat-button" href="http://2012shropgeek.eventbrite.com/"><b>Super Earlybird tickets</b> <i><span class="pound">£</span>15</i>Buy your ticket <span class="where">at EventBrite &raquo;</span></a>	                				
				
                
                <a class="button fat-button" href="http://2012shropgeek.eventbrite.com/"><b>Earlybird tickets</b> <i><span class="pound">£</span>20</i>Buy your ticket <span class="where">at EventBrite &raquo;</span></a>	
				
				
                
               <a class="button fat-button" href="http://2012shropgeek.eventbrite.com/"><b>Earlybird tickets</b> <i><span class="pound">£</span>20</i>SOLD OUT <span class="where">Standard Tickets On Sale Soon</span></a>
               
               	
               
               <a class="button fat-button" href="http://2012shropgeek.eventbrite.com/"><b>Sponsored tickets</b> <i><span class="pound">£</span>25</i>Buy your ticket <span class="where">at EventBrite &raquo;</span></a>	
			   
			   
               
                <a class="button fat-button" href="http://2012shropgeek.eventbrite.com/"><b>The last few!</b> <i><span class="pound">£</span>25</i>Buy your ticket <span class="where">at EventBrite &raquo;</span></a>	
				
				*/ ?>
                
                
                <a class="button fat-button" href="http://2012shropgeek.eventbrite.com/"><b>Great News!</b> <i>Tickets</i>Are Now Sold Out<span class="where">See you all there!</span></a>	
 	    		
	    
    		</section>
			<section class="terms col1">
				<h2>Terms of sale</h2>
				<?php perch_content('BuyTerms');?>				
                
                <h3>Refunds and exchanges</h3>
				<?php perch_content('BuyRefunds');?>

			</section>
			<section class="faqs col2">
			
				<h3>FAQs</h3>
				<h4><?php perch_content('Question1');?></h4>
				<?php perch_content('QuestionAnswer1');?>
                
                <h4><?php perch_content('Question2');?></h4>
				<?php perch_content('QuestionAnswer2');?>
                
                <h4><?php perch_content('Question3');?></h4>
				<?php perch_content('QuestionAnswer3');?>
                
                <h4><?php perch_content('Question4');?></h4>
				<?php perch_content('QuestionAnswer4');?>
                
				
			</section>
    	

    		
    	
    	</article>
   
<?php include "sponsors.php"; ?>

</div> <!-- /main-->
    
<?php include "footer.php"; ?>
    

</body>

</html>