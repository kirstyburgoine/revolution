<?php include('perch/runtime.php');?>

<!DOCTYPE html>
<!-- /ht Paul Irish - http://front.ie/j5OMXi -->
<!--[if lt IE 7 ]> <html class="no-js ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="no-js ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="no-js ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<title>About The Theory of (R)Evolution - 28th September 2012</title>
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
    	
    		<h1 class="major-title">About</h1>
    		
    		<section class="about-event col1">
    			
    				<h2><?php perch_content('EventTitle');?></h2>
    					<?php perch_content('EventImage');?>
                        <?php perch_content('EventContent');?>
	    				
		    		
	    
    		
    		</section>
			
    	
    		<section class="about-shropgeek col2">
    			
    				<h2><?php perch_content('ShropgeekTitle');?></h2>
    					<?php perch_content('ShropgeekImage');?>
	    				<?php perch_content('ShropgeekContent');?>
                       
    		</section>
            
    			<hr class="seperator" />
                
    		<section class="about-team">
    			<h2>The Team</h2>
    			<div class="quattro">
    			
    				<div class="element">
    					<?php perch_content('TeamImage1');?>
    					<h3><?php perch_content('TeamTitle1');?></h3>
    					<div class="sub"><?php perch_content('TeamDesc1');?></div>
    				</div>
    				<div class="element">
    					<?php perch_content('TeamImage2');?>
    					<h3><?php perch_content('TeamTitle2');?></h3>
    					<div class="sub"><?php perch_content('TeamDesc2');?></div>
    				</div>
    				<div class="element">
    					<?php perch_content('TeamImage3');?>
    					<h3><?php perch_content('TeamTitle3');?></h3>
    					<div class="sub"><?php perch_content('TeamDesc3');?></div>
    				</div>
    				<div class="element last">
    					<?php perch_content('TeamImage4');?>
    					<h3><?php perch_content('TeamTitle4');?></h3>
    					<div class="sub"><?php perch_content('TeamDesc4');?></div>
       				</div>
    			</div>
    		</section>
    		
    	
    	</article>
   
    	
<?php include "sponsors.php"; ?>

</div> <!-- /main-->
    
<?php include "footer.php"; ?>
    

</body>

</html>