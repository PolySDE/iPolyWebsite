		<!-- Features Wrapper -->

			<div id="features-wrapper">
            <? 
			/*
			?>
		<!-- Banner Wrapper -->
			<div id="banner-wrapper">
				<div class="inner">

					<!-- Banner -->
						<section id="banner" class="container">
                            <div class="sliderbanner">
                                <ul>
                                    <li><img src="images/homeslider/banner000.jpg" /></li>
                                    <li><img src="images/homeslider/banner001.jpg" /></li>
                                    <li><img src="images/homeslider/banner002.jpg" /></li>
                                    <li><img src="images/homeslider/banner003.jpg" /></li>
                                    <li><img src="images/homeslider/banner004.jpg" /></li>
                                </ul>
                            </div>
						</section>
				</div>
			</div>
            <?
            */
            ?>
				<!-- Features -->
					<section id="features" class="container">
						<?
						/*
                        <header>
							<h2 style="text-transform:none">WHAT MAKES iPOLY, <strong>iPOLY</strong>!</h2>
						</header>
                        */
                        ?>
                        <script type="text/javascript">
						var imgs1 = new Array("images/homeslider/banner000.jpg","images/homeslider/banner001.jpg","images/homeslider/banner002.jpg","images/homeslider/banner003.jpg","images/homeslider/banner004.jpg");
						var lnks1 = new Array("?p=home","?p=home","?p=home","?p=home","?p=home");
						var alt1 = new Array("","","","","");
						var currentAd1 = 0;
						var imgCt1 = 5;
						function cycle1() {
							if (currentAd1 == imgCt1) {
								currentAd1 = 0;
							}
						var banner1 = document.getElementById('adBanner1');
						var link1 = document.getElementById('adLink1');
							banner1.src=imgs1[currentAd1]
							banner1.alt=alt1[currentAd1]
							document.getElementById('adLink1').href=lnks1[currentAd1]
							currentAd1++;
						}
							window.setInterval("cycle1()",3000);
						</script>
						<a href="?p=home" id="adLink1" target="_top">
						<img src="images/homeslider/banner001.jpg" id="adBanner1" class="image image-full"/></a>
						<div align="center" class="row">
							<div align="center" class="4u">
								<!-- Feature -->
									

							</div>
							<div class="4u">

								<!-- Feature -->
									
									
							</div>
							<div class="4u">

								<!-- Feature -->
									

							</div>
						</div>
                        <? /*
						<ul class="actions">
							<li><a href="#" class="button button-icon fa fa-file">Tell Me More</a></li>
						</ul>
						*/
						?>
					</section>
			</div>
		<!-- Main Wrapper -->
			<div id="main-wrapper">
				<!-- Main -->
					<div id="main" class="container">
						<div class="row">
							<!-- Content -->
								<div id="content" class="8u">
									<!-- Post -->
										<article class="is-post">
											<header>
												<h2 style="display:inline;"><a href="?p=contact_calendar">Announcements</a></h2>
											</header>
<p>
<iframe src="https://www.google.com/calendar/embed?height=600&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=ipolyhsmainoffice%40gmail.com&amp;color=%232952A3&amp;ctz=America%2FLos_Angeles" style=" border-width:0 " width="100%" height="600" frameborder="0" scrolling="no"></iframe>
</p>
										</article>
								
								</div>
								<?
								$sider = new PolySider();
								if(isset($_SESSION['is_admin']) && $edit==1){
									$sider->paintEdit();
								} else {
									$sider->paint();
								}
								?>
						</div>
					</div>

			</div>
