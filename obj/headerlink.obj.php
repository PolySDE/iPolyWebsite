<?
error_reporting(E_ALL);
 ini_set("display_errors", 1);
class PolyHeader {
	private $childInits;
	function __construct($childInits = array()){
		$this->childInits = $childInits;
	}
	function paint(){
		//echo htmlspecialchars('<ul>')."<br>";
		echo "<ul>";
		for($x = 0; $x < count($this->childInits); $x++){
			$this->childInits[$x]->paint();
		}
		//echo htmlspecialchars('</ul>');
		echo "</ul>";
	}
	function serializeThis(){
		return base64_encode(serialize($this));
	}
}
class PolyHeaderInit {
	private $icon, $url, $text, $parentObject;
	function __construct($icon, $url, $text, $parent = null){
		$this->icon		= $icon;
		$this->url		= $url;
		$this->text 	= $text;
		$this->parentObject = $parent;
	}
	function paint(){
		//echo htmlspecialchars('<li>')."<br>";
		echo "<li>";
		//echo htmlspecialchars('<a class="'.$this->icon.'" href="'.$this->url.'">'.$this->text.'</a>')."<br>";
		echo '<a class="'.$this->icon.'" href="'.$this->url.'">'.$this->text.'</a>';
		if($this->parentObject != null){
			$this->parentObject->paint();
		}
		//echo htmlspecialchars('</li>')."<br>";
		echo "</li>";
	}
}
class PolyHeaderLinkParent {
	private $children;
	function __construct($children = array()){
		$this->children = $children;
	}
	function paint(){
		//echo htmlspecialchars('<ul>')."<br>";
		echo "<ul>";
		for($x = 0; $x < count($this->children); $x++){
			$this->children[$x]->paint();
		}
		//echo htmlspecialchars('</ul>')."<br>";
		echo "</ul>";
	}
}
class PolyHeaderExpandChild {
	private $text, $childrenP;
	function __construct($text, $childrenP){
		$this->text = $text;
		$this->childrenP = $childrenP;
	}
	function paint(){
		//echo htmlspecialchars('<li>')."<br>";
		echo '<li>';
		//echo htmlspecialchars('<a href=""><div style="float:left;">'.$this->text.'</div><i class="fa fa-arrow-right" style="font-size:12px; float:right;"></i><div style="clear:both;"></div></a>')."<br>";
		echo '<a href=""><div style="float:left;">'.$this->text.'</div><i class="fa fa-arrow-right" style="font-size:12px; float:right;"></i><div style="clear:both;"></div></a>';
		$this->childrenP->paint();
		//echo htmlspecialchars('</li>')."<br>";
		echo '</li>';
	}
}
class PolyHeaderLinkChild {
	private $url, $text, $target;
	function __construct($url, $text, $target = ""){
		$this->url	= $url;
		$this->text	= $text;
		$this->target = $target;
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
	function paint(){
		//echo htmlspecialchars('<li><a href="'.$this->url.'">'.$this->text.'</a></li>')."<br>";
		echo '<li><a href="'.$this->url.'">'.$this->text.'</a></li>';
	}
}
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

$aeries = new PolyHeaderInit("icon-e", "", "<span>Aeries Portal</span>",
	new PolyHeaderLinkParent(
		array(
			new PolyHeaderLinkChild("https://studentinfo.lacoemis.org/ipolyparent", "Parent/Student", "_blank"),
			new PolyHeaderLinkChild("https://studentinfo.lacoemis.org/ipolyteacher", "Teacher", "_blank"),
			new PolyHeaderLinkChild("https://studentinfo.lacoemis.org/aeries.net", "Staff", "_blank")
		)
	)
);

/*
$header = new PolyHeader(array($home, $about, $academic, $pbl, $admissions, $departments, $parent, $aeries));
$header->paint();
echo "<br><br>";
echo $header->serializeThis();
*/
?>