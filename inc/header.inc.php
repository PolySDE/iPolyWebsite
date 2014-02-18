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
		<script>
                tinymce.init({
					selector:'textarea.tinymce',
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
	</head>
	<body class="homepage">

		<!-- Header Wrapper -->
			<div id="header-wrapper">
						
				<!-- Header -->
					<div id="header" class="container">
						
						<!-- Logo -->
							<h1 id="logo"><a href="?p=home" class="disabled"><img src="images/IPoly_logo.svg" style="width:auto; height:200px; margin-bottom:20px; margin-top:0px"><br>iPoly High School</a></h1>
							<p>Where Common Core meets PBL...</p>
						
						<!-- Nav -->
							<nav id="nav">
								<ul>
									<li><a class="fa fa-home" href="?p=home"><span>Home</span></a></li>
									<li><a href="" class="fa fa-info"><span>About Us</span></a>
										<ul>
											<li><a href="?p=about_pm">Principal's Message</a></li>
											<li><a href="?p=about_apg">Assistant Principal's Greeting</a></li>
											<li><a href="?p=about_mission">School Mission</a></li>
                                            <li><a href="?p=about_profile">School Profile</a></li>
                                            <li><a href="?p=about_history">History</a></li>
                                            <li><a href="?p=about_staff">Faculty & Staff</a></li>
                                            <li><a href="?p=about_accred">Accreditation</a></li>
                                            <li><a href="?p=about_building">New Building</a></li>
                                            <li><a href="?p=about_faq">Assesment FAQs</a></li>
                                            <li><a href="?p=about_ptsa">PTSA</a></li>
                                            <li><a href="?p=about_support">Support iPoly</a></li>
										</ul>
									</li>
									<li>
                                    	<a class="fa fa-pencil" href=""><span>Academic Life</span></a>
                                    	<ul>
                                        	<li><a href="?p=academic_cur">Curriculum Overview</a></li>
                                            <li><a href="?p=academic_extra">Extracurricular Activities</a></li>
                                            <li><a href="?p=academic_service">Community Service Learning</a></li>
                                            <li><a href="images/ESLRS.pdf">Expected School-wide Learning Results</a></li>
                                            <li><a href="?p=academic_graduation">Graduation Requirements</a></li>
                                        </ul>
                                    </li>
									<li>
                                    	<a class="fa fa-flask" href=""><span>Project-Based Learning</span></a>
                                        <ul>
                                        	<li><a href="?p=pbl_what">What is PBL?</a></li>
                                            <li><a href="?p=pbl_gallery">Photo Gallery</a></li>
                                            <li>
                                            	<a href=""><div style="float:left;">Video Gallery</div><i class="fa fa-arrow-right" style="font-size:12px; float:right;"></i><div style="clear:both;"></div></a>
                                                <ul>
                                                	<li><a href="?p=pbl_top_video">iPoly Race to the Top Video</a></li>
                                                    <li><a href="?p=pbl_video">Project-Based Learning Video</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="?p=pbl_schedule">Project Presentation Schedule</a></li>
                                            <li><a href="?p=pbl_workshops">PBL Workshops</a></li>
                                        </ul>
                                    </li>
									<li>
                                    	<a class="fa fa-user" href=""><span>Admissions</span></a>
                                    	<ul>
                                        	<li><a href="?p=admissions_process">Admissions Process and Information</a></li>
                                            <li><a href="?p=admissions_faq">Admissions FAQ</a></li>
                                            <li>
                                            	<a href=""><div style="float:left;">Applications</div><i class="fa fa-arrow-right" style="font-size:12px; float:right;"></i><div style="clear:both;"></div></a>
                                                <ul>
                                                	<li><a href="images/iPoly_Application_2013-14_School_Year.pdf">Application for the 2013-14 School Year</a></li>
                                                    <li><a href="images/iPoly_Application_2014-15_School_Year.pdf">Application for the 2014-15 School Year</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="images/iPoly_Event_Flyer_2013-14_School_Year.pdf">Information Sessions 2013-14 School Year</a></li>
                                        </ul>
                                    </li>
                                    
                                    <li><a class="fa fa-sitemap" href=""><span>Departments</span></a>
                                    	<ul>
                                        	<li>
                                            	<a href=""><div style="float:left;">9th Grade</div><i class="fa fa-arrow-right" style="font-size:12px; float:right;"></i><div style="clear:both;"></div></a>
                                                <ul>
                                                	<li><a href="#">9th Grade Student Schedule</a></li>
                                                    <li><a href="?p=9th_english">English</a></li>
                                                    <li><a href="?p=9th_math">Math</a></li>
                                                    <li><a href="?p=9th_science">Science</a></li>
                                                    <li><a href="?p=9th_social">Social Science</a></li>
                                                </ul>
                                            </li>
                                        	<li>
                                            	<a href=""><div style="float:left;">10th Grade</div><i class="fa fa-arrow-right" style="font-size:12px; float:right;"></i><div style="clear:both;"></div></a>
                                                <ul>
                                                	<li><a href="#">10th Grade Student Schedule</a></li>
                                                    <li><a href="?p=10th_english">English</a></li>
                                                    <li><a href="?p=10th_math">Math</a></li>
                                                    <li><a href="?p=10th_science">Science</a></li>
                                                    <li><a href="?p=10th_social">Social Science</a></li>
                                                </ul>
                                            </li>
                                        	<li>
                                            	<a href=""><div style="float:left;">11th Grade</div><i class="fa fa-arrow-right" style="font-size:12px; float:right;"></i><div style="clear:both;"></div></a>
                                                <ul>
                                                	<li><a href="#">11th Grade Student Schedule</a></li>
                                                    <li><a href="?p=11th_english">English</a></li>
                                                    <li><a href="?p=11th_math">Math</a></li>
                                                    <li><a href="?p=11th_science">Science</a></li>
                                                    <li><a href="?p=11th_social">Social Science</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                            	<a href=""><div style="float:left;">12th Grade</div><i class="fa fa-arrow-right" style="font-size:12px; float:right;"></i><div style="clear:both;"></div></a>
                                                <ul>
                                                	<li><a href="#">12th Grade Student Schedule</a></li>
                                                    <li><a href="?p=12th_english">English</a></li>
                                                    <li><a href="?p=12th_math">Math</a></li>
                                                    <li><a href="?p=12th_science">Science</a></li>
                                                    <li><a href="?p=12th_social">Social Science</a></li>
                                                    <li><a href="?p=12th_project">Senior Project</a></li>
                                                </ul>
                                            </li>                                    
                                            <li><a href="?p=fl">Foreign Language</a></li>
                                            <li><a href="?p=sped">Special Education</a></li>
                                            <li><a href="?p=pe">PE/Health</a></li>
                                            <li><a href="?p=counseling">Counseling Center</a></li>
                                            <li><a href="?p=admissions">Admissions</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                    	<a class="fa fa-folder-open" href=""><span>Parent Resources</span></a>
                                        <ul>
                                        	<li><a href="?p=parents_general">General Information</a></li>
                                            <li><a href="?p=parents_commitment">Parent Commitment</a></li>
                                            <li><a href="?p=parents_ptsa">PTSA</a></li>
                                            <li><a href="?p=parents_standards">State standards and Assessment Tests</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                    	<a class="fa fa-group" href=""><span>Alumni</span></a>
                                        <ul>
                                        	<li><a href="?p=alumni_general">General Information and Announcements</a></li>
                                            <li><a href="?p=alumni_classes">Graduating Classes</a></li>
                                            <li><a href="?p=alumni_contact">Alumni Contact</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                    	<a class="fa fa-envelope" href=""><span>Contact</span></a>
                                        <ul>
                                        	<li><a href="?p=contact_">Contact Information</a></li>
                                            <li><a href="?p=contact_">Calendar</a></li>
                                            <li><a href="?p=contact_">iPoly High School Map</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                    	<a class="fa fa-group" href="https://studentinfo.lacoemis.org/ipolyparent/LoginParent.aspx?page=default.aspx" target="_blank"><span>Grades</span></a>
                                        </li>
								</ul>
							</nav>

					</div>
			</div>
