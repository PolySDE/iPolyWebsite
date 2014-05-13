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
	function addEvent($event){
		array_push($this->events, $event);
	}
	function fetchData(){
		$this->addEvent(new PolyEvent("AP Calculus Testing", "8:00am - 12:00pm"));
		$this->addEvent(new PolyEvent("Grad Night Cut Off", "Grad Night Cut Off"));
		$this->addEvent(new PolyEvent("Exit Interviews", "Seniors"));
		$this->addEvent(new PolyEvent("Drama Production", "Drama Elective"));
	}
	function paint(){
		?>
                                <div id="sidebar" class="4u">
                                    <section>
                                        <ul class="divided">
                                            <li>
                                                <article class="is-excerpt">
                                                <span class="date" style="margin-bottom:10px;"><? echo $this->title; ?></span>
                                                <?
												for($x = 0; $x < count($this->events); $x++){
													?>
                                                    <header style="margin-bottom:0px; margin-top:0px; padding-left:0px;">
                                                        <h3 style="margin-bottom:0px;"><a href="#"><? echo $this->events[$x]->title; ?></a></h3>
                                                    </header>
                                                    <p style="margin-bottom:10px; margin-top:0px;padding-left:30px;"><? echo $this->events[$x]->content; ?></p>
                                                    <?
												}
												?>
                                                </article>
                                            </li>								
                                         </ul>
                                    </section>
								</div>
        <?
	}
}
?>