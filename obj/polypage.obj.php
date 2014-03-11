<?
class PolyPage {
	private $pageType, $pageContent, $pageTitle, $pageSidebarContent;
	function __construct($pageType, $pageTitle){
		$this->pageType = $pageType;
		$this->pageTitle = $pageTitle;
	}
	function setPageContent($pageContent){
		$this->pageContent = $pageContent;
	}
	function setSidebarContent($sidebarContent){
		$this->pageSidebarContent = trim($sidebarContent);
	}
	function printPage(){
		if($this->pageType=="no-sidebar"){
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
                                                <div class="headerfix">
                                                <h2 style="display:inline;"><? echo $this->pageTitle?></h2>
                                                <?
													if(isset($_SESSION['is_admin'])){
														?>
														<a href="?p=<? echo $_GET['p']; ?>&e=1" class="button button-icon fa fa-pencil-square-o">Edit</a>
													<?
													}
													?>
                                                    </div>
                                                </header>
                                                
                                                                                                <?
//<span class="image image-full"><img src="images/pic04.jpg" alt="" /></span>
                                                echo $this->pageContent;
                                                ?>
                                            </article>
                                    </div>
                            </div>
                        </div>
                </div>
        <?
		}
				if($this->pageType=="left-sidebar"){
		?>
                <!-- Main Wrapper -->
                <div id="main-wrapper">
                    <!-- Main -->
                        <div id="main" class="container">
                            <div class="row">
                            <div id="sidebar" class="4u">
								
									<!-- Excerpts -->
										<section>
											<ul class="divided">
                                            <? echo $this->pageSidebarContent; ?>
												<li>
													<!-- Excerpt -->
														<article class="is-excerpt">
															<header>
																<span class="date" style="margin-bottom:1em;">9th Grade Departments</span>
																<h3 style="padding-bottom:0; margin-bottom:0;"><a href="#">9th English</a></h3>
                                                                <h3 style="padding-bottom:0; margin-bottom:0;"><a href="#">9th Math</a></h3>
															</header>
														</article>

												</li>
											</ul>
										</section>
                                <!-- Content -->
                                    <div id="content" class="8u skel-cell-important">
                                        <!-- Post -->
                                            <article class="is-post">
                                                <header>
                                                <div class="headerfix">
                                                <h2 style="display:inline;"><? echo $this->pageTitle?></h2>
                                                <?
													if(isset($_SESSION['is_admin'])){
														?>
														<a href="?p=<? echo $_GET['p']; ?>&e=1" class="button button-icon fa fa-pencil-square-o">Edit</a>
													<?
													}
													?>
                                                    </div>
                                                </header>
                                                
                                                                                                <?
//<span class="image image-full"><img src="images/pic04.jpg" alt="" /></span>
                                                echo $this->pageContent;
                                                ?>
                                            </article>
                                    </div>
                            </div>
                        </div>
                </div>
        <?
		}
	}
	function printEditPage(){
		//var_dump($this);
		if($this->pageType=="no-sidebar"){
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
                                            <form action="func/edit.func.php" method="post">
                                            <input type="hidden" name="page" value="<? echo $_GET['p'];?>" />
                                            <input type="hidden" name="sidebarContent" value="<? echo $this->pageSidebarContent;?>" />
                                            <select name="pageType" style="width:auto;">
                                            	<option value="no-sidebar" <? if($this->pageType=="no-sidebar"){ echo "selected"; }?>>No Sidebar</option>
                                                <option value="left-sidebar" <? if($this->pageType=="left-sidebar"){ echo "selected"; }?>>Left Sidebar</option>
                                            </select>
                                            <input type="submit" name="submit" class="button button-icon" value="Save" />
                                                <header>
                                                    <h2 style="display:inline;"><textarea id="redactor1" name="pageTitle" rows="2"><? echo $this->pageTitle?></textarea></h2>
                                                    <br />
                                                </header>
                                                <textarea id="redactor2" name="pageContent">
                                                                                                <?
												//<span class="image image-full"><img src="images/pic04.jpg" alt="" /></span>
                                                echo $this->pageContent;
                                                ?>
                                                </textarea>
                                                <?
												if($this->pageType=="left-sidebar"){
													?>
                                                    <textarea id="redactor" name="sidebarContent">
                                                    <? echo $this->pageSidebarContent; ?>
                                                    </textarea>
                                                    <?
												}
												?>
                                                <input type="submit" name="submit" class="button button-icon" value="Save"/>
                                                </form>
                                            </article>
                                    </div>
                            </div>
                        </div>
                </div>
        <?
		}
				if($this->pageType=="left-sidebar"){
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
                                            <form action="func/edit.func.php" method="post">
                                            <input type="hidden" name="page" value="<? echo $_GET['p'];?>" />
                                            <select name="pageType" style="width:auto;">
                                            	<option value="no-sidebar" <? if($this->pageType=="no-sidebar"){ echo "selected"; }?>>No Sidebar</option>
                                                <option value="left-sidebar" <? if($this->pageType=="left-sidebar"){ echo "selected"; }?>>Left Sidebar</option>
                                            </select>
                                                <header>
                                                    <h2 style="display:inline;"><textarea id="redactor" name="pageTitle" rows="2"><? echo $this->pageTitle?></textarea></h2>
                                                    <input type="submit" name="submit" class="button button-icon" value="Save" />
                                                    <br />
                                                </header>
                                                <textarea id="redactor" style="height:auto;" name="pageContent">
                                                                                                <?
												//<span class="image image-full"><img src="images/pic04.jpg" alt="" /></span>
                                                echo $this->pageContent;
                                                ?>
                                                </textarea>
                                                <input type="submit" name="submit" class="button button-icon" value="Save"/>
                                                <?
												if($this->pageType=="left-sidebar"){
													?>
                                                    <textarea id="redactor" name="sidebarContent">
                                                    <? echo $this->pageSidebarContent; ?>
                                                    </textarea>
                                                    <input type="submit" name="submit" class="button button-icon" value="Save"/>
                                                    <?
												}
												?>
                                                </form>
                                            </article>
                                    </div>
                            </div>
                        </div>
                </div>
        <?
		}
	}
	function serializeThis(){
		return base64_encode(serialize($this));
	}
}
?>
