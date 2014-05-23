<?
session_start();
if(isset($_GET['p'])){
	header("Location: /?p=".$_GET['p']);
} else {
	include_once("func/config.func.php");
	include_once("obj/polysite.obj.php");
	include_once("obj/polypage.obj.php");
	include_once("obj/headerlink.obj.php");
	$thissite = new PolySite();
	include_once("inc/header.inc.php");
	?>
			<!-- Main Wrapper -->
				<div id="main-wrapper">
	
					<!-- Main -->
						<div id="main" class="container">
							<div class="row">
							
								<!-- Content -->
									<div id="content" class="12u skel-cell-important">
	
										<!-- Post -->
											<article class="is-post">
												<header>
													<h2>Admin Login</h2>
												</header>
												<form method="post" action="func/login.func.php">
										<div class="row half">
											<div class="3u">
												<input name="username" placeholder="Username" type="text" class="text" />
											</div>
										</div>
										<div class="row half">
											<div class="3u">
												<input name="password" placeholder="Password" type="password" class="text" />
											</div>
										</div>
										<div class="row half">
											<div class="3u">
												<input type="submit" class="button" name="submit" value="Login" />
											</div>
										</div>
										</form>
											</article>
									
									</div>
									
							</div>
						</div>
	
				</div>
	<?
	include_once("inc/footer.inc.php");
}
?>