<?
error_reporting(E_ALL);
 ini_set("display_errors", 1);
class PolyHeader {
	public $childInits;
	function __construct($childInits = array()){
		$this->childInits = $childInits;
	}
	function paint(){
		echo "<ul>";
		for($x = 0; $x < count($this->childInits); $x++){
			$this->childInits[$x]->paint();
		}
		echo "</ul>";
	}
	function paintAdminLink(){
		echo "<ul>";
		for($x = 0; $x < count($this->childInits); $x++){
			$this->childInits[$x]->paint();
		}
		echo "<li><a class='fa fa-cog' href='?p=admin'><span>Admin Panel</span></a>";
		echo "</ul>";
	}
	function paintAdminOverlay(){
		for($x = 0; $x < count($this->childInits); $x++){
			$this->childInits[$x]->paintAdminOverlay();
		}
	}
	function paintAdminPanel(){
		?>
        <div class="row 12u">
        <?
		for($x = 0; $x < count($this->childInits); $x++){
			$this->childInits[$x]->paintAdminPanel();
		}
		?>
        </div>
        <?
	}
	function serializeThis(){
		return base64_encode(serialize($this));
	}
	function getChildren(){
		return $this->childInits;
	}
	function setChildren($children){
		$this->childInits = $children;
	}
	function updatePolyHeaderInit($uuid, $text, $icon, $url){
		for($x = 0; $x < count($this->childInits); $x++){
			if($this->childInits[$x]->uuid==$uuid){
				$this->childInits[$x]->setText($text);
				$this->childInits[$x]->setIcon($icon);
				$this->childInits[$x]->setURL($url);
			}
		}
	}
	function updatePolyHeaderLinkChild($uuid, $url, $text, $target){
		for($x = 0; $x < count($this->childInits); $x++){
			$this->childInits[$x]->updatePolyHeaderLinkChild($uuid, $url, $text, $target);
		}
	}
	function updatePolyHeaderExpandChild($uuid, $text){
		for($x = 0; $x < count($this->childInits); $x++){
			$this->childInits[$x]->updatePolyHeaderExpandChild($uuid, $text);
		}
	}
}
class PolyHeaderInit {
	public $icon, $url, $text, $parentObject, $uuid;
	function __construct($icon, $url, $text, $parent = null){
		$this->icon		= $icon;
		$this->url		= $url;
		$this->text 	= $text;
		$this->parentObject = $parent;
		$this->uuid = uniqid();
	}
	function paint(){
		echo "<li>";
		echo '<a class="'.$this->icon.'" href="'.$this->url.'">'.$this->text.'</a>';
		if($this->parentObject != null){
			$this->parentObject->paint();
		}
		echo "</li>";
	}
	function paintAdminPanel(){
		?>
        <div class="row 12u">
            <div class="4u" style="padding-top:0; margin-top:5px;" id="<? echo $this->getUUID(); ?>">
                Text: <? echo $this->getText(); ?><br />
                Icon: <? echo $this->getIcon()." <span class='".$this->getIcon()."'></span>"; ?><br />
                URL: <? echo $this->getURL(); ?><br />
                <a rel="#<? echo $this->getUUID(); ?>" class="button button-icon fa fa-pencil-square-o" style="padding: 0.5em 1.5em 0.5em 1.5em; margin-bottom:5px;">Edit</a>
            </div>
            <?
			if($this->parentObject != null){
				$this->parentObject->paintAdminPanelInit();
			}
			?>
        </div>
        <?
	}
	function getIcon(){
		return $this->icon;
	}
	function getURL(){
		return $this->url;
	}
	function getText(){
		return $this->text;
	}
	function getParent(){
		return $this->parentObject;
	}
	function setIcon($icon){
		$this->icon = $icon;
	}
	function setURL($url){
		$this->url = $url;
	}
	function setText($text){
		$this->text = $text;
	}
	function setParent($parent){
		$this->parentObject = $parent;
	}
	function getUUID(){
		return $this->uuid;
	}
	function updatePolyHeaderLinkChild($uuid, $url, $text, $target){
		if($this->parentObject!=null){
			$this->parentObject->updatePolyHeaderLinkChild($uuid, $url, $text, $target);
		}
	}
	function updatePolyHeaderExpandChild($uuid, $text){
		if($this->parentObject!=null){
			$this->parentObject->updatePolyHeaderExpandChild($uuid, $text);
		}
	}
	function paintAdminOverlay(){
		?>
        <div class="simple_overlay" id="<? echo $this->getUUID(); ?>">
            <p style="margin-left:10px;">
            <form style="margin-left:10px; margin-right:10px;" name="<? echo $this->getUUID(); ?>" action="func/header.edit.php" method="post">
                <input type="hidden" name="uuid" value="<? echo $this->getUUID(); ?>" />
                <h3 style="color:#FFF; margin-bottom:5px;">Text (Be sure to keep the &lt;span&gt; &amp; &lt;/span&gt;</h3>
                <input type="text" name="text" value="<? echo $this->getText(); ?>" class="text"/>
                <h3 style="color:#FFF; margin-bottom:5px;">Icon <a href="http://fontawesome.io/icons/" target="_blank"><i>List of Icons</i></a> <font color="red">Be sure to keep the <i>fa</i>!</font></h3>
                <input type="text" name="icon" value="<? echo $this->getIcon(); ?>" class="text" />
                <h3 style="color:#FFF; margin-bottom:5px;">URL</h3>
                <input type="text" name="url" value="<? echo $this->getURL(); ?>" class="text" />
                <center><a href="#" class="button button-icon fa fa-save" style="margin-top:10px;" onclick="document.forms['<? echo $this->getUUID(); ?>'].submit(); return false;">Save</a></center>
            </form>
            </p>
        </div>
        <?
		if($this->parentObject != null){
			$this->parentObject->paintAdminOverlay();
		}
	}
}
class PolyHeaderLinkParent {
	public $children, $uuid;
	function __construct($children = array()){
		$this->children = $children;
		$this->uuid = uniqid();
	}
	function paint(){
		echo "<ul>";
		for($x = 0; $x < count($this->children); $x++){
			$this->children[$x]->paint();
		}
		echo "</ul>";
	}
	function paintAdminPanelInit(){
		?>
        <div class="8u" style="padding-top:0;">
        	<div class="row 12u" style=" padding-top:0;">
            <?
			for($x = 0; $x < count($this->children); $x++){
				$this->children[$x]->paintAdminPanel();
			}
			?>
            </div>
        </div>
        <?
	}
	function paintAdminPanel(){
		?>
        <div class="row 12u" style=" padding-top:0;">
        <?
        for($x = 0; $x < count($this->children); $x++){
            $this->children[$x]->paintAdminPanel();
        }
        ?>
        </div>
        <?
	}
	function paintAdminOverlay(){
		for($x = 0; $x < count($this->children); $x++){
			$this->children[$x]->paintAdminOverlay();
		}
	}
	function getChildren(){
		return $this->children;
	}
	function setChildren($children){
		$this->children = $children;
	}
	function getUUID(){
		return $this->uuid;
	}
	function updatePolyHeaderLinkChild($uuid, $url, $text, $target){
		for($x = 0; $x < count($this->children); $x++){
			if(get_class($this->children[$x])=="PolyHeaderLinkChild"){
				if($this->children[$x]->uuid==$uuid){
					$this->children[$x]->setText($text);
					$this->children[$x]->setURL($url);
					$this->children[$x]->setTarget($target);
				}
			} else if(get_class($this->children[$x])=="PolyHeaderExpandChild"){
				$this->children[$x]->updatePolyHeaderLinkChild($uuid, $url, $text, $target);
			}
		}
	}
	function updatePolyHeaderExpandChild($uuid, $text){
		for($x = 0; $x < count($this->children); $x++){
			if(get_class($this->children[$x])=="PolyHeaderExpandChild"){
				if($this->children[$x]->uuid==$uuid){
					$this->children[$x]->setText($text);
				} else {
					$this->children[$x]->updatePolyHeaderExpandChild($uuid, $text);
				}
			}
		}
	}
}
class PolyHeaderExpandChild {
	public $text, $childrenP, $uuid;
	function __construct($text, $childrenP){
		$this->text = $text;
		$this->childrenP = $childrenP;
		$this->uuid = uniqid();
	}
	function paint(){
		echo '<li>';
		echo '<a href=""><div style="float:left;">'.$this->text.'</div><i class="fa fa-arrow-right" style="font-size:12px; float:right;"></i><div style="clear:both;"></div></a>';
		$this->childrenP->paint();
		echo '</li>';
	}
	function paintAdminPanel(){
		?>
        <div class="row 12u">
            <div class="4u" style="padding-top:0; padding-left:30px;" id="<? echo $this->uuid; ?>">
                Text: <? echo $this->getText(); ?>
                <a rel="#<? echo $this->uuid; ?>" class="button button-icon fa fa-pencil-square-o" style="padding: 0.5em 1.5em 0.5em 1.5em; margin-bottom:5px;">Edit</a>
            </div>
            <div class="8u">
                <?
                if($this->childrenP!=null){
                    $this->childrenP->paintAdminPanel();
                }
                ?>
            </div>
        </div>
        <?
	}
	function paintAdminOverlay(){
		?>
        <div class="simple_overlay" id="<? echo $this->uuid; ?>">
            <p style="margin-left:10px;">
            <form style="margin-left:10px; margin-right:10px;" name="<? echo $this->uuid; ?>" action="func/header.edit.php" method="post">
                <input type="hidden" name="uuid" value="<? echo $this->uuid; ?>" />
                <h3 style="color:#FFF; margin-bottom:5px;">Text</h3>
                <input type="text" name="text" value="<? echo $this->getText(); ?>" class="text"/>
                <center><a href="#" class="button button-icon fa fa-save" style="margin-top:10px;" onclick="document.forms['<? echo $this->uuid; ?>'].submit(); return false;">Save</a></center>
            </form>
            </p>
        </div>
        <?
		$this->childrenP->paintAdminOverlay();
	}
	function getParent(){
		return $this->childrenP;
	}
	function getText(){
		return $this->text;
	}
	function setParent($parent){
		$this->childrenP = $parent;
	}
	function setText($text){
		$this->text = $text;
	}
	function getUUID(){
		return $this->uuid;
	}
	function updatePolyHeaderLinkChild($uuid, $url, $text, $target){
		$this->childrenP->updatePolyHeaderLinkChild($uuid, $url, $text, $target);
	}
	function updatePolyHeaderExpandChild($uuid, $text){
		$this->childrenP->updatePolyHeaderExpandChild($uuid, $text);
	}
}
class PolyHeaderLinkChild {
	public $url, $text, $target, $uuid;
	function __construct($url, $text, $target = ""){
		$this->url	= $url;
		$this->text	= $text;
		$this->target = $target;
		$this->uuid = uniqid();
	}
	function getURL(){
		return $this->url;
	}
	function getText(){
		return $this->text;
	}
	function setURL($url){
		$this->url = $url;
	}
	function setText($text){
		$this->text = $text;
	}
	function getTarget(){
		return $this->target;
	}
	function setTarget($target){
		$this->target = $target;
	}
	function paint(){
		echo '<li><a href="'.$this->url.'">'.$this->text.'</a></li>';
	}
	function paintAdminPanel(){
		?>
		<div class="row 12u" style="padding-top:0; margin-top:5px;" id="<? echo $this->uuid; ?>">
			Text: <? echo $this->getText(); ?><br />
			URL: <? echo $this->getURL(); ?><br />
			<? if($this->getTarget()=="_blank"){ echo "Open in: New tab"; } else { echo "Open in: Same tab";} ?><br />
			<a rel="#<? echo $this->uuid; ?>" class="button button-icon fa fa-pencil-square-o" style="padding: 0.5em 1.5em 0.5em 1.5em; margin-bottom:5px;">Edit</a>
		</div>
        <?
	}
	function paintAdminOverlay(){
		?>
        <div class="simple_overlay" id="<? echo $this->uuid; ?>">
            <p style="margin-left:10px;">
            <form style="margin-left:10px; margin-right:10px;" name="<? echo $this->uuid; ?>" action="func/header.edit.php" method="post">
            	<input type="hidden" name="uuid" value="<? echo $this->uuid; ?>" />
                <h3 style="color:#FFF; margin-bottom:5px;">Text</h3>
                <input type="text" name="text" value="<? echo $this->getText(); ?>" class="text"/>
                <h3 style="color:#FFF; margin-bottom:5px;">URL</h3>
                <input type="text" name="url" value="<? echo $this->getURL(); ?>" class="text" />
                <h3 style="color:#FFF; margin-bottom:5px;">Open In</h3>
                <select name="target">
                    <option value="" <? if($this->getTarget()==""){ echo "selected"; }?>>Same Tab</option>
                    <option value="_blank" <? if($this->getTarget()=="_blank"){ echo "selected"; }?>>New Tab</option>
                </select>
                <center><a href="#" class="button button-icon fa fa-save" style="margin-top:10px;" onclick="document.forms['<? echo $this->uuid; ?>'].submit(); return false;">Save</a></center>
            </form>
            </p>
        </div>
        <?
	}
	function getUUID(){
		return $this->uuid;
	}
}
/*
$home = new PolyHeaderInit("fa fa-home", "?p=home", "<span>Home</span>");
$about = new PolyHeaderInit("fa fa-info", "", "<span>About Us</span>",
	new PolyHeaderLinkParent(
		array(
			new PolyHeaderLinkChild("?p=about_pm", "Principal's Message"),
			new PolyHeaderLinkChild("?p=contact_calendar", "Calendar"),
			new PolyHeaderLinkChild("?p=about_apg", "Assistant Principal's Greeting"),
			new PolyHeaderLinkChild("?p=about_mission", "School Mission"),
			new PolyHeaderLinkChild("?p=about_profile", "School Profile"),
			new PolyHeaderLinkChild("?p=about_history", "History"),
			new PolyHeaderLinkChild("?p=about_staff", "Faculty & Staff"),
			new PolyHeaderLinkChild("?p=about_accred", "Accreditation"),
			new PolyHeaderLinkChild("?p=about_building", "New Building"),
			new PolyHeaderLinkChild("?p=about_faq", "Assessment FAQs"),
			new PolyHeaderLinkChild("?p=about_ptsa", "PTSA"),
			new PolyHeaderLinkChild("?p=about_support", "Support iPoly"),
			new PolyHeaderLinkChild("?p=contact_map", "iPoly High School Map"),
			new PolyHeaderLinkChild("?p=contact_info", "Contact Information")
		)
	)
);
$academic = new PolyHeaderInit("fa fa-pencil", "", "<span>Academic Life</span>",
	new PolyHeaderLinkParent(
		array(
			new PolyHeaderLinkChild("?p=academic_cur", "Curriculum Overview"),
			new PolyHeaderLinkChild("?p=academic_extra", "Extracurricular Activities"),
			new PolyHeaderLinkChild("?p=academic_service", "Community Service Learning"),
			new PolyHeaderLinkChild("images/ESRS.pdf", "Expected School-wide Learning Results", "_blank"),
			new PolyHeaderLinkChild("?p=academic_graduation", "Graduation Requirements"),
			new PolyHeaderExpandChild("Alumni", 
				new PolyHeaderLinkParent(
					array(
						new PolyHeaderLinkChild("?p=alumni_general", "General Information and Announcements"),
						new PolyHeaderLinkChild("?p=alumni_classes", "Graduating Classes"),
						new PolyHeaderLinkChild("?p=alumni_contact", "Alumni Contact")
					)
				)
			)
		)
	)
);
$pbl = new PolyHeaderInit("fa fa-flask", "", "<span>Project-Based Learning</span>",
	new PolyHeaderLinkParent(
		array(
			new PolyHeaderLinkChild("?p=pbl_what", "What is PBL?"),
			new PolyHeaderLinkChild("?p=pbl_gallery", "Photo Gallery"),
			new PolyHeaderExpandChild("Video Gallery", 
				new PolyHeaderLinkParent(
					array(
						new PolyHeaderLinkChild("?p=pbl_top_video", "iPoly Race to the Top Video"),
						new PolyHeaderLinkChild("?p=pbl_video", "Project-Based Learning Video")
					)
				)
			),
			new PolyHeaderLinkChild("?p=pbl_schedule", "Project Presentation Schedule"),
			new PolyHeaderLinkChild("?p=pbl_workshops", "PBL Workshops")
		)
	)
);
$admissions = new PolyHeaderInit("fa fa-user", "", "<span>Admissions</span>",
	new PolyHeaderLinkParent(
		array(
			new PolyHeaderLinkChild("?p=admissions_process", "Admissions Process and Information"),
			new PolyHeaderLinkChild("http://ipolyregister.lacoemis.org/", "Apply Online", "_blank"),
			new PolyHeaderLinkChild("?p=admissions_faq", "Admissions FAQ"),
			new PolyHeaderExpandChild("Applications", 
				new PolyHeaderLinkParent(
					array(
						new PolyHeaderLinkChild("images/iPoly_Application_2013-14_School_Year.pdf", "Application for the 2013-14 School Year", "_blank"),
						new PolyHeaderLinkChild("images/iPoly_Application_2014-15_School_Year.pdf", "Application for the 2014-15 School Year", "_blank")
					)
				)
			),
			new PolyHeaderLinkChild("images/iPoly_Event_Flyer_2013-14_School_Year.pdf", "Information Sessions 2013-14 School Year", "_blank")
		)
	)
);

$departments = new PolyHeaderInit("fa fa-sitemap", "", "<span>Departments</span>",
	new PolyHeaderLinkParent(
		array(
			new PolyHeaderExpandChild("9th Grade", 
				new PolyHeaderLinkParent(
					array(
						new PolyHeaderLinkChild("images/9th_Grade_Block_Schedule_2013-14.pdf", "9th Grade Student Schedule", "_blank"),
						new PolyHeaderLinkChild("http://ipoly9.blogspot.com/", "9th Grade Blog", "_blank"),
						new PolyHeaderLinkChild("?p=9th_english", "English"),
						new PolyHeaderLinkChild("?p=9th_math", "Math"),
						new PolyHeaderLinkChild("?p=9th_science", "Science"),
						new PolyHeaderLinkChild("?p=9th_social", "Social Science")
					)
				)
			),
			new PolyHeaderExpandChild("10th Grade", 
				new PolyHeaderLinkParent(
					array(
						new PolyHeaderLinkChild("images/10th_Grade_Block_Schedule_2013-14.pdf", "10th Grade Student Schedule", "_blank"),
						new PolyHeaderLinkChild("?p=10th_english", "English"),
						new PolyHeaderLinkChild("?p=10th_math", "Math"),
						new PolyHeaderLinkChild("?p=10th_science", "Science"),
						new PolyHeaderLinkChild("?p=10th_social", "Social Science")
					)
				)
			),
			new PolyHeaderExpandChild("11th Grade", 
				new PolyHeaderLinkParent(
					array(
						new PolyHeaderLinkChild("images/11th_Grade_Block_Schedule_2013-14.pdf", "11th Grade Student Schedule", "_blank"),
						new PolyHeaderLinkChild("?p=11th_english", "English"),
						new PolyHeaderLinkChild("?p=11th_math", "Math"),
						new PolyHeaderLinkChild("?p=11th_science", "Science"),
						new PolyHeaderLinkChild("?p=11th_social", "Social Science")
					)
				)
			),
			new PolyHeaderExpandChild("12th Grade", 
				new PolyHeaderLinkParent(
					array(
						new PolyHeaderLinkChild("images/12th_Grade_Block_Schedule_2013-14.pdf", "12th Grade Student Schedule", "_blank"),
						new PolyHeaderLinkChild("?p=12th_english", "English"),
						new PolyHeaderLinkChild("?p=12th_math", "Math"),
						new PolyHeaderLinkChild("?p=12th_science", "Science"),
						new PolyHeaderLinkChild("?p=12th_social", "Social Science"),
						new PolyHeaderLinkChild("?p=12th_project", "Senior Project"),
						new PolyHeaderLinkChild("http://ipolyclassof2014.blogspot.com/", "12th Grade Blog", "_blank")
					)
				)
			),
			new PolyHeaderLinkChild("?p=fl", "Foreign Language"),
			new PolyHeaderLinkChild("?p=pe", "PE/Health"),
			new PolyHeaderLinkChild("?p=sped", "Special Education"),
			new PolyHeaderLinkChild("?p=rop", "ROP"),
			new PolyHeaderLinkChild("?p=counseling", "Counseling Center")
		)
	)
);


$parent = new PolyHeaderInit("fa fa-folder-open", "", "<span>Parent Resources</span>",
	new PolyHeaderLinkParent(
		array(
			new PolyHeaderLinkChild("?p=parents_general", "General Information"),
			new PolyHeaderLinkChild("?p=parents_commitment", "Parent Commitment"),
			new PolyHeaderLinkChild("?p=parents_ptsa", "PTSA"),
			new PolyHeaderLinkChild("?p=parents_standards", "State Standards & Assessment Tests"),
		)
	)
);

$aeries = new PolyHeaderInit("icon-e", "", "<span>Portals</span>",
	new PolyHeaderLinkParent(
		array(
			new PolyHeaderLinkChild("https://studentinfo.lacoemis.org/ipolyparent", "Parent", "_blank"),
			new PolyHeaderLinkChild("https://studentinfo.lacoemis.org/ipolyparent", "Student", "_blank"),
			new PolyHeaderLinkChild("http://ipolyregister.lacoemis.org", "New Student Enrollment", "_blank"),
			new PolyHeaderLinkChild("https://studentinfo.lacoemis.org/ipolyteacher", "Teacher", "_blank"),
			new PolyHeaderLinkChild("https://studentinfo.lacoemis.org/aeries.net", "Staff", "_blank")
		)
	)
);


$header = new PolyHeader(array($home, $about, $academic, $pbl, $admissions, $departments, $parent, $aeries));
//$header->paint();
echo "<br><br>";
echo $header->serializeThis();
*/
?>
