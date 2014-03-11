<!DOCTYPE HTML>
<!--
	Strongly Typed 1.1 by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>iPoly High School</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta name="viewport" content="width=1040" />
        <link rel="shortcut icon" type="image/png" href="/favicon.png"/>
		<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600|Arvo:700" rel="stylesheet" type="text/css" />
        <?
        //<link rel="stylesheet" href="js/jquery.fancybox.css" type="text/css" media="screen" />
		?>
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
        <script src="js/jquery.min.js"></script>
		<script src="js/jquery.dropotron.min.js"></script>
		<script src="js/config.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-panels.min.js"></script>
        <script src="js/unslider.js"></script>
        <script src="js/tinymce/tinymce.min.js"></script>


	<!-- Redactor is here -->
	<link rel="stylesheet" href="js/redactor.css" />
	<script src="js/redactor.min.js"></script>

	<script type="text/javascript">
	$(document).ready(
		function()
		{
			$('#redactor').redactor();
			$('#redactor1').redactor();
			$('#redactor2').redactor();
			$('#redactor3').redactor();
			$('#redactor4').redactor();
			$('#redactor5').redactor();
		}
	);
	</script>
		<script>
                tinymce.init({
					selector:'textarea.tinymce',
					content_css: "css/style.css, css/style-desktop.css",
					style_formats: [
        {title: 'Image Class', classes: 'image'},
		{title: 'Image-Right Class', classes: 'image, image-right'},
		{title: 'Image-Full Class', classes: 'image-full'}
    ],
					plugins: [
                 "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                 "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                 "save table contextmenu directionality emoticons template paste textcolor"]
					});
        </script>
        <script type="text/javascript">
		$(function() {
			$('.sliderbanner').unslider({
				speed: 500,               //  The speed to animate each slide (in milliseconds)
				delay: 3000,              //  The delay between slide animations (in milliseconds)
				complete: function() {},  //  A function that gets called after every slide animation
				keys: true,               //  Enable keyboard (left, right) arrow shortcuts
				dots: true,               //  Display dot navigation
				fluid: false              //  Support responsive design. May break non-responsive designs
			});
		});
		</script>
		<noscript>
			<link rel="stylesheet" href="css/skel-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-desktop.css" />
		</noscript>
        <link rel="stylesheet" href="css/eaglefont.css" />
	</head>
	<body class="homepage">
		<!-- Header Wrapper -->
			<div id="header-wrapper">
				<!-- Header -->
					<div id="header" class="container">
                    <?
					if(isset($_GET['p'])){
						$page = $_GET['p'];
					} else {
						$page = "";
					}
					if($page=="home" || $page == ""){
					?>
						<!-- Logo -->
							<h1 id="logo"><a href="?p=home" class="disabled"><img src="images/IPoly_logo.svg" style="width:auto; height:150px; margin-bottom:20px; margin-top:0px"><br><div style="text-transform:none;">IPOLY HIGH SCHOOL</div></a></h1>
							<p>Welcome to the new site of iPoly high school. This site is currently under construction.<br>To see the current site please visit us at <a href="http://ipolyhighschool.org">iPolyHighSchool.org</a>.</p>
						<!-- Nav -->
                        <?
					}
					?>
							<nav id="nav">
                            <?
                            $dbh = new mysqli($db_host, $db_user, $db_pass, $db_name);
							if($dbh->connect_errno >0){
								die("Mysql ERROR!! " . $dbh->connect_error);
							}
							if($queryh = $dbh->prepare("SELECT * FROM `settings` WHERE `id`='headerlinks'")){
								$queryh->execute();
								$queryh->bind_result($obj['id'], $obj['value']);
								while($queryh->fetch()){
									$object = unserialize(base64_decode($obj['value']));
									$object->paint();
								}
							}
							?>
							</nav>

					</div>
			</div>
