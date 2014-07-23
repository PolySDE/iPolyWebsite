<?
class PolyEvent {
	public $title, $content;
	function __construct($title, $content){
		$this->title = $title;
		$this->content = $content;
	}
}
class PolySider {
	private $title;
	private $events;
	function __construct($events = array(), $title = "This Week At IPOLY HS"){
		$this->title = $title;
		$this->events = $events;
		$this->fetchData();
	}
	function setTitle($title){
		$this->title = $title;
	}
	function addEvent($event){
		array_push($this->events, $event);
	}
	function setEvents($events){
		$this->events = $events;
	}
	function getEvents(){
		return $this->events;
	}
	function fetchData(){
		global $db_host, $db_user, $db_pass, $db_name;
		//fetch object data from database
		$dbh = new mysqli($db_host, $db_user, $db_pass, $db_name);
		if($dbh->connect_errno >0){
			die("Mysql ERROR!! " . $dbh->connect_error);
		}
		if($queryh = $dbh->prepare("SELECT * FROM `settings` WHERE `id`='homesider'")){
			$queryh->execute();
			$queryh->bind_result($obj['id'], $obj['value']);
			while($queryh->fetch()){
				$object = unserialize(base64_decode($obj['value']));
				$this->events = $object->events;
				$this->title = $object->title;
				return true;
				//$object->paint();
			}
			$queryh->close();
		} else {
			return false;
		}
		$dbh->close();
	}
	function paint(){
		?>
                                <div id="sidebar" class="4u">
                                    <section>
                                        <ul class="divided">
                                            <li>
                                                <article class="is-excerpt">
													<?  if(isset($_SESSION['is_admin'])){
														if(isset($_GET['p'])){
															$pagee = $_GET['p'];
														} else {
															$pagee = "home";
														}
														?>
                                                        <a href="?p=<? echo $pagee; ?>&e=1" class="button button-icon fa fa-pencil-square-o" style="margin-bottom:10px;">Edit</a>
                                                    <? } ?>
                                                    <span class="date" style="margin-bottom:10px;"><? echo $this->title; ?></span>
                                                    <?
                                                    for($x = 0; $x < count($this->events); $x++){
                                                        ?>
                                                        <header style="margin-bottom:0px; margin-top:0px; padding-left:0px;">
                                                            <h3 style="margin-bottom:0px;"><a href="#"><? echo $this->events[$x]->title; ?></a></h3>
                                                            <?  if(isset($_SESSION['is_admin'])){ ?>
                                                            	<h3 style="margin-bottom:0px; padding-left:280px;"><a href="func/homesider.edit.php?delete=1&eid=<? echo $x;?>" style="color:#F00;">DELETE</a></h3>
                                                            <? } ?>
                                                        </header>
                                                        <p style="margin-bottom:10px; margin-top:0px;padding-left:30px;"><? echo $this->events[$x]->content; ?></p>
                                                        <?
                                                    }
                                                    ?>
                                                </article>
                                            </li>								
                                         </ul>
                                      <? /*   <h3><? echo $this->serializeThis(); ?></h3> */ ?>
                                    </section>
								</div>
        <?
	}
	function paintEdit(){
		?>
                                <div id="sidebar" class="4u">
                                    <section>
                                        <ul class="divided">
                                            <li>
                                                <article class="is-excerpt">
                                                	<h1>Edit Events</h1>
                                                	<form action="func/homesider.edit.php" method="post" autocomplete="off">
                                                    	Title: <input type="text" name="title" value="<? echo $this->title; ?>" class="text"/>
														<?
                                                        for($x = 0; $x < count($this->events); $x++){
                                                            ?>
                                                            Event <? echo ($x+1); ?> Title: <input type="text" name="<? echo $x."title"; ?>" value="<? echo $this->events[$x]->title; ?>" class="text"/>
    
                                                            <p style="margin-bottom:10px; margin-top:0px;padding-left:30px;">
                                                                <textarea name="<? echo $x."text"; ?>"><? echo $this->events[$x]->content; ?></textarea>
                                                            </p>
                                                            <?
                                                        }
                                                        ?>
                                                        <h1>Add Event</h1>
                                                        <h3 style="margin-bottom:0px; margin-left:20px;">Leave both fields blank if you're not adding an event!</h3>
                                                        Event Title: <input type="text" class="text" name="newtitle" />
                                                        <p style="margin-bottom:10px; margin-top:0px;padding-left:30px;">
                                                        	<textarea name="newtext"></textarea>
                                                        </p>
                                                        Insert Before:
                                                        <select name="before">
                                                        	<?
															for($x = 0; $x < count($this->events); $x++){
																?>
                                                                <option value="<? echo $x; ?>">Event <? echo ($x+1); ?></option>
                                                                <?
															}
															?>
                                                            <option value="<? echo count($this->events); ?>" selected="selected" >Add To End</option>
                                                        </select>
                                                        <input type="submit" name="submit" value="Save" class="button button-icon" />
                                                    </form>
                                                </article>
                                            </li>								
                                         </ul>
                                    </section>
								</div>
                                <?
	}
	function serializeThis(){
		return base64_encode(serialize($this));
	}
	function pushData(){
		global $db_host, $db_user, $db_pass, $db_name;
		//fetch object data from database
		$dbh = new mysqli($db_host, $db_user, $db_pass, $db_name);
		if($dbh->connect_errno >0){
			die("Mysql ERROR!! " . $dbh->connect_error);
		}
		if($queryh = $dbh->prepare("UPDATE `settings` SET value=? WHERE `id`='homesider'")){
			$queryh->bind_param("s", $this->serializeThis());
			$queryh->execute();
			$queryh->close();
		} else {
			die($dbh->error);
		}
		$dbh->close();
	}
}
?>