<?php include('perch/runtime.php');?>

<!DOCTYPE html>
<!-- /ht Paul Irish - http://front.ie/j5OMXi -->
<!--[if lt IE 7 ]> <html class="no-js ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="no-js ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="no-js ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<title>Speakers | The Theory of (R)Evolution - 28th September 2012</title>
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

<body class="speakers-page">
  
  
    
<?php include "navigation.php"; ?>    

   
    <div id="main" role="main">
    	<article class="site-container">
    		
    		<h1 class="major-title">Speakers</h1>
    		<section class="speaker">
    			<div class="photo">
    				
    				<?php perch_content('SpeakerImage1');?>
    			</div>
    			<div class="description">
    				<h2><?php perch_content('SpeakerTitle1');?></h2>
    				<p class="meta"><?php perch_content('SpeakerMeta1');?></p>
    				
                    <?php perch_content('SpeakerContent1');?>
                    
    				<p class="vanity-links"><a href="http://twitter.com/nicepaul" class="twitter">@nicepaul</a> <a href="http://nicepaul.com " class="website">http://nicepaul.com</a></p>
    				
    			</div>
    		</section>
    		<hr class="seperator" id="jakesmith" />
    		<section class="speaker">
    			<div class="photo">
    				
    				<?php perch_content('SpeakerImage2');?>
    			</div>
    			<div class="description">
    				<h2><?php perch_content('SpeakerTitle2');?></h2>
    				<p class="meta">
    					<?php perch_content('SpeakerMeta2');?>
    				</p>
    				<?php perch_content('SpeakerContent2');?>
    			<p class="vanity-links"><a href="http://twitter.com/jake74" class="twitter">@jake74</a> <a href="http://jp74.com/" class="website">http://jp74.com</a></p>	
    			</div>
    		</section>
    		<hr class="seperator" id="neilkinnish" />
    		<section class="speaker">
    			<div class="photo">
    				
    				<?php perch_content('SpeakerImage3');?>
    			</div>
    			<div class="description">
    				<h2><?php perch_content('SpeakerTitle3');?></h2>
    				<p class="meta">
    					<?php perch_content('SpeakerMeta3');?>
    				</p>
    				<?php perch_content('SpeakerContent3');?>
    				<p class="vanity-links"><a href="http://twitter.com/neiltak" class="twitter">@neiltak</a> <a href="http://neilkinnish.com/" class="website">http://neilkinnish.com</a></p>
    			</div>
    		</section>
            
            <hr class="seperator" id="mikekus" />
    		<section class="speaker">
    			<div class="photo">
    				
    				<?php perch_content('SpeakerImage4');?>
    			</div>
    			<div class="description">
    				<h2><?php perch_content('SpeakerTitle4');?></h2>
    				<p class="meta">
    					<?php perch_content('SpeakerMeta4');?>
    				</p>
    				<?php perch_content('SpeakerContent4');?>
    				<p class="vanity-links"><a href="http://twitter.com/mikekus" class="twitter">@mikekus</a> <a href="http://mikekus.com/" class="website">http://mikekus.com</a></p>
    			</div>
    		</section>
    	</article>
   
    	
<?php include "sponsors.php"; ?>

</div> <!-- /main-->
    
<?php include "footer.php"; ?>
    
  

</body>

</html>