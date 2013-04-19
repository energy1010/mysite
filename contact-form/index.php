<?php
	// Start session.
	session_start();
	
	// Set a key, checked in mailer, prevents against spammers trying to hijack the mailer.
	$security_token = $_SESSION['security_token'] = uniqid(rand());
	
	if ( ! isset($_SESSION['formMessage'])) {
		$_SESSION['formMessage'] = 'Fill in the form below to send me an email.';	
	}
	
	if ( ! isset($_SESSION['formFooter'])) {
		$_SESSION['formFooter'] = '';
	}
	
	if ( ! isset($_SESSION['form'])) {
		$_SESSION['form'] = array();
	}
	
	function check($field, $type = '', $value = '') {
		$string = "";
		if (isset($_SESSION['form'][$field])) {
			switch($type) {
				case 'checkbox':
					$string = 'checked="checked"';
					break;
				case 'radio':
					if($_SESSION['form'][$field] === $value) {
						$string = 'checked="checked"';
					}
					break;
				case 'select':
					if($_SESSION['form'][$field] === $value) {
						$string = 'selected="selected"';
					}
					break;
				default:
					$string = $_SESSION['form'][$field];
			}
		}
		return $string;
	}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="generator" content="RapidWeaver" />
		
		<title>Contact</title>
		<link rel="stylesheet" type="text/css" media="screen" href="../rw_common/themes/bravo/styles.css"  />
		<!--[if IE 6]><link rel="stylesheet" type="text/css" media="screen" href="../rw_common/themes/bravo/ie6.css"  /><![endif]-->
		<link rel="stylesheet" type="text/css" media="screen" href="../rw_common/themes/bravo/colourtag-theme-default.css"  />
		<link rel="stylesheet" type="text/css" media="print" href="../rw_common/themes/bravo/print.css"  />
		<link rel="stylesheet" type="text/css" media="handheld" href="../rw_common/themes/bravo/handheld.css"  />
		<link rel="stylesheet" type="text/css" media="screen" href="../rw_common/themes/bravo/css/width/750.css" />
		<link rel="stylesheet" type="text/css" media="screen" href="../rw_common/themes/bravo/css/sidebar/left.css" />
		
		
		<script type="text/javascript" src="../rw_common/themes/bravo/javascript.js"></script>
		
		<!--[if IE 6]> 
			<style type="text/css" media="screen">body {behavior: url(../rw_common/themes/bravo/csshover.htc);}</style>
			<script type="text/javascript" charset="utf-8">
				var blankSrc = "../rw_common/themes/bravo/png/blank.gif";
			</script>	
			<style type="text/css">

			img {
				behavior:	url("../rw_common/themes/bravo/png/pngbehavior.htc");
			}

			</style>
		<![endif]-->
		
		
	</head>
<body>
<div id="topbar">
	<img src="../rw_common/themes/bravo/images/top_bar_bg.png" alt="" style="width: 3000px; height: 16px;" />
</div>
<div id="topgrad">
	<img src="../rw_common/themes/bravo/images/top_grad.png" alt="" style="width: 3000px; height: 348px;" />
</div>
<div id="container"><!-- Start container -->
	<div id="sidebarContainer"><!-- Start Sidebar wrapper -->
		<div id="pageHeader"><!-- Start page header -->
			
			<h1>energy1010</h1>
			<h2>keep moving,  Changing the world, one site at a time&hellip;</h2>
			<div class="clearer"></div>
		</div><!-- End page header -->
		<div id="navcontainer"><!-- Start Navigation -->
			<ul><li><a href="../" rel="self" class="currentAncestor">Home</a><ul><li><a href="../styled-2/" rel="self">Introduction</a></li><li><a href="./" rel="self" id="current">Contact</a></li><li><a href="../iframe/" rel="self">IFrames</a></li><li><a href="../photos/" rel="self">Photos</a></li><li><a href="../sitemap/" rel="self">SiteMap</a></li></ul></li><li><a href="../blog/" rel="self">Blog</a></li><li><a href="../styled/" rel="self">Articles</a></li><li><a href="../styled-3/" rel="self">Libary</a></li><li><a href="../movies/" rel="self">Movie</a></li><li><a href="../sitemap-2/" rel="self">SiteMap</a></li></ul>
		</div><!-- End navigation -->
		<div id="sidebar"><!-- Start sidebar content -->
			<h1 class="sideHeader"></h1><!-- Sidebar header -->
			<!-- sidebar content you enter in the page inspector -->
			 <!-- sidebar content such as the blog archive links -->
		</div><!-- End sidebar content -->
	</div><!-- End sidebar wrapper -->
	<div id="contentContainer"><!-- Start main content wrapper -->
		<div id="content"><!-- Start content -->
			
<div class="message-text"><?php echo $_SESSION['formMessage']; unset($_SESSION['formMessage']); ?></div><br />

<form action="./files/mailer.php" method="post" enctype="multipart/form-data">
	 <div>
		<label>Your Name:</label> *<br />
		<input class="form-input-field" type="text" value="<?php echo check('element0'); ?>" name="form[element0]" size="40"/><br /><br />

		<label>Your Email:</label> *<br />
		<input class="form-input-field" type="text" value="<?php echo check('element1'); ?>" name="form[element1]" size="40"/><br /><br />

		<label>Subject:</label> *<br />
		<input class="form-input-field" type="text" value="<?php echo check('element2'); ?>" name="form[element2]" size="40"/><br /><br />

		<label>Message:</label> *<br />
		<textarea class="form-input-field" name="form[element3]" rows="8" cols="38"><?php echo check('element3'); ?></textarea><br /><br />

		<div style="display: none;">
			<label>Spam Protection: Please don't fill this in:</label>
			<textarea name="comment" rows="1" cols="1"></textarea>
		</div>
		<input type="hidden" name="form_token" value="<?php echo $security_token; ?>" />
		<input class="form-input-button" type="reset" name="resetButton" value="Reset" />
		<input class="form-input-button" type="submit" name="submitButton" value="Submit" />
	</div>
</form>

<br />
<div class="form-footer"><?php echo $_SESSION['formFooter']; unset($_SESSION['formFooter']); ?></div><br />

<?php unset($_SESSION['form']); ?>
			<div class="clearer"></div>
		</div><!-- End content -->
		
		<div id="footer"><!-- Start Footer -->
			<p>&copy; 2012 Lexus <a href="#" id="rw_email_contact">Contact Me</a><script type="text/javascript">var _rwObsfuscatedHref0 = "mai";var _rwObsfuscatedHref1 = "lto";var _rwObsfuscatedHref2 = ":85";var _rwObsfuscatedHref3 = "765";var _rwObsfuscatedHref4 = "928";var _rwObsfuscatedHref5 = "@qq";var _rwObsfuscatedHref6 = ".co";var _rwObsfuscatedHref7 = "m";var _rwObsfuscatedHref = _rwObsfuscatedHref0+_rwObsfuscatedHref1+_rwObsfuscatedHref2+_rwObsfuscatedHref3+_rwObsfuscatedHref4+_rwObsfuscatedHref5+_rwObsfuscatedHref6+_rwObsfuscatedHref7; document.getElementById('rw_email_contact').href = _rwObsfuscatedHref;</script></p>
			<div id="breadcrumbcontainer"><!-- Start the breadcrumb wrapper -->
				
			</div><!-- End breadcrumb -->
		</div><!-- End Footer -->
	</div><!-- End main content wrapper -->
</div><!-- End container -->
</body>
</html>
