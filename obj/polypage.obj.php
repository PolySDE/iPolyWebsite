<?
class PolyPage {
	private $pageType, $pageContent, $pageTitle;
	function __construct($pageType, $pageTitle){
		$this->pageType = $pageType;
		$this->pageTitle = $pageTitle;
	}
	function setPageContent($pageContent){
		$this->pageContent = $pageContent;
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
	}
	function printEditPage(){
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
                                            <input type="hidden" name="pageType" value="<? echo $this->pageType; ?>" />
                                                <header>
                                                    <h2 style="display:inline;"><textarea class="tinymce" name="pageTitle" rows="2"><? echo $this->pageTitle?></textarea></h2>
                                                    <input type="submit" name="submit" class="button button-icon" value="Save" />
                                                    <br />
                                                </header>
                                                <textarea class="tinymce" style="height:auto;" name="pageContent">
                                                                                                <?
												//<span class="image image-full"><img src="images/pic04.jpg" alt="" /></span>
                                                echo $this->pageContent;
                                                ?>
                                                </textarea>
                                                <input type="submit" name="submit" class="button button-icon" value="Save"/>
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
