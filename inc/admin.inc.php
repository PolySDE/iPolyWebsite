		<!-- Main Wrapper -->
			<div id="main-wrapper">

				<!-- Main -->
					<div id="main" class="container">
						<div class="row">
							<!-- Sidebar -->
								<div id="sidebar" class="4u">
								
									<!-- Excerpts -->
										<section>
											<ul class="divided">
												<li>
													<!-- Excerpt -->
														<article class="is-excerpt">
															<header>
																<?
                                                                if(isset($_SESSION['is_admin'])){
                                                                ?>
                                                              
                                                                    <span class="date" style="margin-bottom:1em;">Admin Panel</span>
                                                                    <h3 style="padding-bottom:0; margin-bottom:0;"><a href="?p=admin&ap=acc">Account Settings</a></h3>
                                                                    <h3 style="padding-bottom:0; margin-bottom:0;"><a href="?p=admin&ap=perms">Permissions</a></h3>
                                                                    
                                                                    <h3 style="padding-bottom:0; margin-bottom:0;"><a href="?p=admin&ap=header">Header Links</a></h3>
                                                                <?
                                                                } else {
                                                                ?>
                                                                	<span class="date" style="margin-bottom:1em">Not Logged In!</span>
                                                                <?
																}
																?>
															</header>
														</article>

												</li>
											</ul>
										</section>
								</div>
							<!-- Content -->
								<div id="content" class="8u skel-cell-important">
									<!-- Post -->
                                    <?
									if(isset($_GET['ap'])){
										$ap = $_GET['ap'];
									} else {
										$ap = "";
									}
									$found = false;
									if($ap=="perms"){
										$found = true;
									?>
                                        <article class="is-post">
                                            <header>
                                            	<h2>Permissions</h2>
                                            </header>
                                            <p>Your permissions:</p>
                                        </article>
                                    <?
									} else if($ap=="header"){
										$fount = true;
										?>
                                        <article class="is-post">
                                        	<header>
                                            	<h2>Header Links</h2>
                                            </header>
                                        	<p>
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
												}
												$queryh->close();
											}
											$dbh->close();
											$headerChildren = $object->getChildren();
											
											?>
                                            <table>
                                                <tr>
                                                	<td>Parent</td>
                                                    <td>Child</td>
                                                </tr>
                                                <?
												for($x = 0; $x < count($headerChildren); $x++){
													
												}
												?>
                                            </table>
                                            </p>
                                        </article>
                                        <?
									} else if($ap=="acc" || $found == false){
									?>
										<article class="is-post">
											<header>
												<h2>Account Settings</h2>
											</header>
										</article>
                                    <?
									}
									?>
								</div>
						</div>
					</div>
			</div>