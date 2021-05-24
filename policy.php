<?php
// Start session 
if(!session_id()){ 
    session_start();	
}

include 'db.php';
include 'apple/seed.php';

// Initialize shopping cart class 
include_once 'Cart.class.php'; 
$cart = new Cart; 
?>

<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8">
  <title>Policy</title>
	<meta name = "viewport" content = "width=device-width, minimum-scale=1.0, maximum-scale = 1.0, user-scalable = no">
  <link rel="shortcut icon" href="favicon.ico">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
  <!-- jQuery library -->
  <script src="js/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script type="text/javascript" language="javascript" src="js/time.js" ></script>
	<script type="text/javascript" language="javascript" src="js/slide.js" ></script>	
</head>
<body>
   <div id="content">	
	 <?php include( 'slide.php' ); ?> 	  	 
	<div class="shop">
	  <div class="container">
		<div class="row">
			<h1 style="text-align: center;">Cookie policy</h1>
			<p>This cookie policy (&quot;Policy&quot;) describes what cookies are and how and they&#039;re being used by the <a target="_blank" rel="nofollow" href="http://www.fastnfreshproduce.com.au">fastnfreshproduce.com.au</a> website (&quot;Website&quot; or &quot;Service&quot;) and any of its related products and services (collectively, &quot;Services&quot;). This Policy is a legally binding agreement between you (&quot;User&quot;, &quot;you&quot; or &quot;your&quot;) and this Website operator (&quot;Operator&quot;, &quot;we&quot;, &quot;us&quot; or &quot;our&quot;). You should read this Policy so you can understand the types of cookies we use, the information we collect using cookies and how that information is used. It also describes the choices available to you regarding accepting or declining the use of cookies.</p>
			<h2>What are cookies?</h2>
			<p>Cookies are small pieces of data stored in text files that are saved on your computer or other devices when websites are loaded in a browser. They are widely used to remember you and your preferences, either for a single visit (through a &quot;session cookie&quot;) or for multiple repeat visits (using a &quot;persistent cookie&quot;).</p>
			<p>Session cookies are temporary cookies that are used during the course of your visit to the Website, and they expire when you close the web browser.</p>
			<p>Persistent cookies are used to remember your preferences within our Website and remain on your desktop or mobile device even after you close your browser or restart your computer. They ensure a consistent and efficient experience for you while visiting the Website and Services.</p>
			<p>Cookies may be set by the Website (&quot;first-party cookies&quot;), or by third parties, such as those who serve content or provide advertising or analytics services on the Website (&quot;third party cookies&quot;). These third parties can recognize you when you visit our website and also when you visit certain other websites.</p>
			<h2>What type of cookies do we use?</h2>
			<h3>Necessary cookies</h3>
			<p>Necessary cookies allow us to offer you the best possible experience when accessing and navigating through our Website and using its features. For example, these cookies let us recognize that you have created an account and have logged into that account to access the content.</p>
			<h3>Functionality cookies</h3>
			<p>Functionality cookies let us operate the Website and Services in accordance with the choices you make. For example, we will recognize your username and remember how you customized the Website and Services during future visits.</p>
			<h2>What are your cookie options?</h2>
			<p>If you don't like the idea of cookies or certain types of cookies, you can change your browser's settings to delete cookies that have already been set and to not accept new cookies. To learn more about how to do this or to learn more about cookies, visit <a target="_blank" href="https://www.internetcookies.org">internetcookies.org</a></p>
			<h2>Changes and amendments</h2>
			<p>We reserve the right to modify this Policy or its terms relating to the Website and Services at any time, effective upon posting of an updated version of this Policy on the Website. When we do, we will revise the updated date at the bottom of this page. Continued use of the Website and Services after any such changes shall constitute your consent to such changes. Policy was created with <a style="color:inherit" target="_blank" href="https://www.websitepolicies.com/blog/sample-cookie-policy-template">WebsitePolicies</a>.</p>
			<h2>Acceptance of this policy</h2>
			<p>You acknowledge that you have read this Policy and agree to all its terms and conditions. By accessing and using the Website and Services you agree to be bound by this Policy. If you do not agree to abide by the terms of this Policy, you are not authorized to access or use the Website and Services.</p>
			<h2>Contacting us</h2>
			<p>If you would like to contact us to understand more about this Policy or wish to contact us concerning any matter relating to our use of cookies, you may do so via the <a target="_blank" rel="nofollow" href="http://www.fastnfreshproduce.com.au/contact_us.php">contact form</a> or send an email to admi&#110;&#64;fast&#110;&#102;re&#115;h&#112;ro&#100;uce&#46;c&#111;m.au</p>
			<p>This document was last updated on February 9, 2021</p>
		</div>	
	  </div> <!-- END OF SHOP CLASS -->
	<?php include('menu.php'); ?>
	</div>
</body>
</html>