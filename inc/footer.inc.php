		<!-- Footer Wrapper -->
			<div id="footer-wrapper">

				<!-- Footer -->
					<div id="footer" class="container">
						<header>
							<h2>Questions or comments? <strong>Get in touch:</strong></h2>
						</header>
						<div class="row">
							<div class="4u">
								<section>
                                <?
								if(isset($_SESSION['is_admin'])){
									?>
                                    <div class="row half">
                                    	<div class="6u">
                                        Welcome back <? echo $_SESSION['username'];?>!
                                        </div>
                                    </div>
                                    <div class="row half">
                                    	<div class="6u">
                                        </div>
                                    </div>
                                    <div class="row half">
                                    	<div class="12u">
                                        <a href="func/logout.func.php" class="button button-icon fa fa-lock">Logout!</a>
                                        </div>
                                    </div>
                                    <?
								} else {
								?>
									<form method="post" action="func/login.func.php">
                                    <div class="row half">
                                    	<div class="12u">
                                        	<input name="username" placeholder="Username" type="text" class="text" />
                                        </div>
                                    </div>
                                    <div class="row half">
                                    	<div class="12u">
                                        	<input name="password" placeholder="Password" type="password" class="text" />
                                        </div>
                                    </div>
                                    <div class="row half">
                                    	<div class="12u">
                                        	<input type="submit" class="button" name="submit" value="Login" />
                                        </div>
                                    </div>
                                    </form>
                                    <?
								}
								?>
                                <? /*
									<form method="post" action="#">
										<div class="row half">
											<div class="6u">
												<input name="name" placeholder="Name" type="text" class="text" />
											</div>
											<div class="6u">
												<input name="email" placeholder="Email" type="text" class="text" />
											</div>
										</div>
										<div class="row half">
											<div class="12u">
												<textarea name="message" placeholder="Message"></textarea>
											</div>
										</div>
										<div class="row half">
											<div class="12u">
												<a href="#" class="button button-icon fa fa-envelope">Send Message</a>
											</div>
										</div>
									</form>
									*/
									?>
								</section>
							</div>
							<div class="8u">
								<section>
                                    <p></p>
									<div class="row">
										<ul class="icons 8u">
											<li class="fa fa-home">
                                            	3851 W. Temple Avenue<br />
                                                Pomona, CA 91768-2557
											</li>
											<li class="fa fa-phone">
												 Phone: (909) 839-2320<br />
                                                 Fax: (909) 839-2326
											</li>
											<li class="fa fa-envelope">
												<a href="mailto:ipoly@email.com">iPoly@email.com</a>
											</li>
										</ul>
                                        <? /*
										<ul class="icons 4u">
											<li class="fa fa-twitter">
												<a href="">iPoly Social Media</a>
											</li>
											<li class="fa fa-dribbble">
												<a href="">iPoly Social Media</a>
											</li>
											<li class="fa fa-facebook">
												<a href="">iPoly Social Media</a>
											</li>
											<li class="fa fa-google-plus">
												<a href="">iPoly Social Media</a>
											</li>
										</ul>
										*/
										?>
									</div>
								</section>
							</div>
						</div>
					</div>

				<!-- Copyright -->
					<div id="copyright" class="container">
                    	<div style="width:auto; margin-left:auto; margin-right:auto;">
                            <div class="row">
                                <div class="2u">
                                    <section>
                                    <a href="?p=about_support" class="image"><img src="images/homeside1.gif" alt=""/></a>
                                    </section>
                                </div>
                                <div class="2u">
                                    <section>
                                    <a href="?p=about_ptsa" class="image"><img src="images/homeside2.jpeg" alt=""/></a>
                                    </section>
                                </div>
                                <div class="2u">
                                    <section>
                                    <a href="http://www.lacoe.edu/" class="image"><img src="images/homeside3.png" alt="" /></a>
                                    </section>
                                </div>
                                <div class="2u">
                                    <section>
                                    <a href="http://www.csupomona.edu/" class="image"><img src="images/homeside4.jpg" alt="" /></a>
                                    </section>
                                </div>
                                <div class="2u">
                                    <section>
                                    <a href="http://www.ipolyhighschool.org/pages/International_Polytechnic_High/News/iPoly_Named_California_Disting" class="image"><img src="images/homeside5.jpg" alt="" /></a>
                                    </section>
                                </div>
                                <div class="2u">
                                    <section>
                                    <a href="http://lacorop.org/" class="image" target="_blank"><img src="images/homeside6.jpg" alt="" /></a>
                                    </section>
                                </div>
                            </div>
                        </div>
						<ul class="links">
							<li>&copy; <? echo date("Y"); ?> iPoly High School. All rights reserved</li>
							<? /*
                            <li>Design: <a href="http://html5up.net/">HTML5 UP</a></li>
							*/
							?>
						</ul>
					</div>

			</div>

	</body>
</html>