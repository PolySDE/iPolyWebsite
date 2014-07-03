		<!-- Main Wrapper -->
			<div id="main-wrapper">

				<!-- Main -->
					<div id="main" class="container">
						<div class="row">
							<!-- Sidebar -->
								<div id="sidebar" class="3u">
								
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
								<div id="content" class="9u skel-cell-important">
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
											for($x = 0; $x < count($headerChildren); $x++){
												$thisHeaderInit = $headerChildren[$x];
												?>
                                                <div class="simple_overlay" id="headerinit<? echo $x; ?>">
                                                    <p style="margin-left:10px;">
                                                    <form style="margin-left:10px; margin-right:10px;" name="headerinit<? echo $x; ?>" action="func/header.edit.php" method="post">
                                                        <input type="hidden" name="x" value="<? echo $x; ?>" />
                                                        <h3 style="color:#FFF; margin-bottom:5px;">Text (Be sure to keep the &lt;span&gt; &amp; &lt;/span&gt;</h3>
                                                        <input type="text" name="text" value="<? echo $thisHeaderInit->getText(); ?>" class="text"/>
                                                        <h3 style="color:#FFF; margin-bottom:5px;">Icon <a href="http://fontawesome.io/icons/" target="_blank"><i>List of Icons</i></a> <font color="red">Be sure to keep the <i>fa</i>!</font></h3>
                                                        <input type="text" name="icon" value="<? echo $thisHeaderInit->getIcon(); ?>" class="text" />
                                                        <h3 style="color:#FFF; margin-bottom:5px;">URL</h3>
                                                        <input type="text" name="url" value="<? echo $thisHeaderInit->getURL(); ?>" class="text" />
                                                        <center><a href="#" class="button button-icon fa fa-save" style="margin-top:10px;" onclick="document.forms['headerinit<? echo $x; ?>'].submit(); return false;">Save</a></center>
                                                    </form>
                                                    </p>
                                                </div>
                                                <?
												if($thisHeaderInit->getParent()!=null){
													$thisParentsChildren = $thisHeaderInit->getParent()->getChildren();
													for($y = 0; $y < count($thisParentsChildren); $y++){
														if(get_class($thisParentsChildren[$y])=="PolyHeaderLinkChild"){
															//info
															?>
							<div class="simple_overlay" id="thisParentsChildrenx<? echo $x; ?>y<? echo $y; ?>">
                                <p style="margin-left:10px;">
                                <form style="margin-left:10px; margin-right:10px;" name="thisParentsChildrenx<? echo $x; ?>y<? echo $y; ?>" action="func/header.edit.php" method="post">
                                <input type="hidden" name="x" value="<? echo $x; ?>" />
                                    <input type="hidden" name="y" value="<? echo $y; ?>" />
                                    <h3 style="color:#FFF; margin-bottom:5px;">Text</h3>
                                    <input type="text" name="text" value="<? echo $thisParentsChildren[$y]->getText(); ?>" class="text"/>
                                    <h3 style="color:#FFF; margin-bottom:5px;">URL</h3>
                                    <input type="text" name="url" value="<? echo $thisParentsChildren[$y]->getURL(); ?>" class="text" />
                                    <h3 style="color:#FFF; margin-bottom:5px;">Open In</h3>
                                    <select name="target">
                                    	<option value="" <? if($thisParentsChildren[$y]->getTarget()==""){ echo "selected"; }?>>Same Tab</option>
                                        <option value="_blank" <? if($thisParentsChildren[$y]->getTarget()=="_blank"){ echo "selected"; }?>>New Tab</option>
                                    </select>
                                    <center><a href="#" class="button button-icon fa fa-save" style="margin-top:10px;" onclick="document.forms['thisParentsChildrenx<? echo $x; ?>y<? echo $y; ?>'].submit(); return false;">Save</a></center>
                                </form>
                                </p>
                            </div>
                            <?
														} else {
															?>
							<div class="simple_overlay" id="thisParentsChildrenx<? echo $x; ?>y<? echo $y; ?>">
                                <p style="margin-left:10px;">
                                <form style="margin-left:10px; margin-right:10px;" name="thisParentsChildrenx<? echo $x; ?>y<? echo $y; ?>" action="func/header.edit.php" method="post">
                                	<input type="hidden" name="x" value="<? echo $x; ?>" />
                                    <input type="hidden" name="y" value="<? echo $y; ?>" />
                                    <h3 style="color:#FFF; margin-bottom:5px;">Text</h3>
                                    <input type="text" name="text" value="<? echo $thisParentsChildren[$y]->getText(); ?>" class="text"/>
                                    <center><a href="#" class="button button-icon fa fa-save" style="margin-top:10px;" onclick="document.forms['thisParentsChildrenx<? echo $x; ?>y<? echo $y; ?>'].submit(); return false;">Save</a></center>
                                </form>
                                </p>
                            </div>
                           									<?
															$childparentchild = $thisParentsChildren[$y]->getParent()->getChildren();
															?>
															<?
															for($z = 0; $z < count($childparentchild); $z++){

							?>
                            <div class="simple_overlay" id="childparentchildx<? echo $x; ?>y<? echo $y;?>z<? echo $z; ?>">
                                <p style="margin-left:10px;">
                                <form style="margin-left:10px; margin-right:10px;" name="childparentchildx<? echo $x; ?>y<? echo $y;?>z<? echo $z; ?>" action="func/header.edit.php" method="post">
                                	<input type="hidden" name="x" value="<? echo $x; ?>" />
                                	<input type="hidden" name="y" value="<? echo $y; ?>" />
                                    <input type="hidden" name="z" value="<? echo $z; ?>" />
                                    <h3 style="color:#FFF; margin-bottom:5px;">Text</h3>
                                    <input type="text" name="text" value="<? echo $childparentchild[$z]->getText(); ?>" class="text"/>
                                    <h3 style="color:#FFF; margin-bottom:5px;">URL</h3>
                                    <input type="text" name="url" value="<? echo $childparentchild[$z]->getURL(); ?>" class="text" />
                                    <h3 style="color:#FFF; margin-bottom:5px;">Open In</h3>
                                    <select name="target">
                                    	<option value="" <? if($childparentchild[$z]->getTarget()==""){ echo "selected"; }?>>Same Tab</option>
                                        <option value="_blank" <? if($childparentchild[$z]->getTarget()=="_blank"){ echo "selected"; }?>>New Tab</option>
                                    </select>
                                    <center><a href="#" class="button button-icon fa fa-save" style="margin-top:10px;" onclick="document.forms['childparentchildx<? echo $x; ?>y<? echo $y;?>z<? echo $z; ?>'].submit(); return false;">Save</a></center>
                                </form>
                                </p>
                            </div>
                            <?
															}
														}
													}
												}
											}
											?>
                                            <div class="row 12u">
                                            	<div class="row 12u">
                                                	<div class="4u">
                                                    	
                                                    </div>
                                                    <div class="8u">
                                                    	
                                                    </div>
                                                </div>
                                                <?
												for($x = 0; $x < count($headerChildren); $x++){
													$thisHeaderInit = $headerChildren[$x];
													?>
                                                <div class="row 12u">
                                                	<div class="4u" style="border: 1px solid grey; padding-top:0; margin-top:5px;" id="headerinitst<? echo $x; ?>">
                                                        Text: <? echo $thisHeaderInit->getText(); ?><br />
                                                        Icon: <? echo $thisHeaderInit->getIcon()." <span class='".$thisHeaderInit->getIcon()."'></span>"; ?><br />
                                                        URL: <? echo $thisHeaderInit->getURL(); ?><br />
                                                        <a rel="#headerinit<? echo $x; ?>" class="button button-icon fa fa-pencil-square-o" style="padding: 0.5em 1.5em 0.5em 1.5em; margin-bottom:5px;">Edit</a>
                                                    </div>
                                                    <div class="8u" style="padding-top:0;">
                                                    	<?
														if($thisHeaderInit->getParent()!=null){
															$thisParentsChildren = $thisHeaderInit->getParent()->getChildren();
															for($y = 0; $y < count($thisParentsChildren); $y++){
																?>
                                                                <div class="row 12u" style=" padding-top:0;">
                                                                	<?
																	if(get_class($thisParentsChildren[$y])=="PolyHeaderLinkChild"){
																		?>
                                                                        <div class="12u" style="border: 1px solid grey; padding-top:0; margin-top:5px;" id="thisParentsChildrenstx<? echo $x; ?>y<? echo $y; ?>">
                                                                            <?
																			echo "Text: ".$thisParentsChildren[$y]->getText()."<br>";
																			echo "URL: ".$thisParentsChildren[$y]->getURL()."<br>";
																			if($thisParentsChildren[$y]->getTarget()=="_blank"){
																				echo "Open in: New tab";
																			} else {
																				echo "Open in: Same tab";
																			}
																			?><br />
                                                                            <a rel="#thisParentsChildrenx<? echo $x; ?>y<? echo $y; ?>" class="button button-icon fa fa-pencil-square-o" style="padding: 0.5em 1.5em 0.5em 1.5em; margin-bottom:5px;">Edit</a>
                                                                        </div>
                                                                        <?
																	} else {
																		?>
                                                                        <div class="4u" style="border: 1px solid grey; padding-top:0; padding-left:30px;" id="thisParentsChildrenstx<? echo $x; ?>y<? echo $y; ?>">
                                                                        	Text: <? echo $thisParentsChildren[$y]->getText(); ?>
                                                                            <a rel="#thisParentsChildrenx<? echo $x; ?>y<? echo $y; ?>" class="button button-icon fa fa-pencil-square-o" style="padding: 0.5em 1.5em 0.5em 1.5em; margin-bottom:5px;">Edit</a>
                                                                        </div>
                                                                        <div class="8u" style="border: 1px solid grey; padding-top:0;">
                                                                        	<?
																			$childparentchild = $thisParentsChildren[$y]->getParent()->getChildren();
																			?>
                                                                            <?
																			for($z = 0; $z < count($childparentchild); $z++){
																				?>
                                        <div class="row 12u" style="border: 1px solid grey; padding-top:0; margin-top:5px;" id="childparentchildstx<? echo $x; ?>y<? echo $y;?>z<? echo $z; ?>">
                                        	Text: <? echo $childparentchild[$z]->getText(); ?><br />
                                            URL: <? echo $childparentchild[$z]->getURL(); ?><br />
                                            <? if($childparentchild[$z]->getTarget()=="_blank"){ echo "Open in: New tab"; } else { echo "Open in: Same tab";} ?><br />
                                            <a rel="#childparentchildx<? echo $x; ?>y<? echo $y;?>z<? echo $z; ?>" class="button button-icon fa fa-pencil-square-o" style="padding: 0.5em 1.5em 0.5em 1.5em; margin-bottom:5px;">Edit</a>
                                        </div>
                                                                                <?
																			}
																			?>
                                                                        </div>
                                                                        <?
																	}
																	?>
                                                                </div>
                                                                <?
															}
														}
														?>
                                                    </div>
                                                </div>
                                                    <?
												}
												?>
                                            </div>
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