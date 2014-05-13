<?
class PolyEvent {
	public $title, $content;
	function __construct($title, $content){
		$this->title = $title;
		$this->content = $content;
	}
}
class PolySider {
	private $events;
	function __construct($events = array()){
		$this->events = $events;
	}
	function addEvent($event){
		array_push($this->events, $event);
	}
	function paint(){
		?>
                                <div id="sidebar" class="4u">
                                    <section>
                                        <ul class="divided">
                                            <li>
                                                <article class="is-excerpt">
                                                <span class="date" style="margin-bottom:10px;">This Week At IPOLY HS</span>
                                                    <header style="margin-bottom:0px; margin-top:0px; padding-left:0px;">
                                                        <h3 style="margin-bottom:0px;"><a href="#">AP Calculus Testing</a></h3>
                                                    </header>
                                                    <p style="margin-bottom:10px; margin-top:0px;padding-left:30px;">8:00am - 12:00pm</p>
                                                    
                                                    <header style="margin-bottom:0px; margin-top:0px; padding-left:0px;">
                                                        <h3 style="margin-bottom:0px;"><a href="#">Grad Night Cut Off</a></h3>
                                                    </header>
                                                    <p style="margin-bottom:10px; margin-top:0px;padding-left:30px;">Seniors</p>
                                                    
                                                    <header style="margin-bottom:0px; margin-top:0px; padding-left:0px;">
                                                        <h3 style="margin-bottom:0px;"><a href="#">Exit Interviews</a></h3>
                                                    </header>
                                                    <p style="margin-bottom:10px; margin-top:0px;padding-left:30px;">Seniors</p>
                                                    
                                                    <header style="margin-bottom:0px; margin-top:0px; padding-left:0px;">
                                                        <h3 style="margin-bottom:0px;"><a href="#">Drama Production</a></h3>
                                                    </header>
                                                    <p style="margin-bottom:10px; margin-top:0px;padding-left:30px;">Drama Elective</p>
                                                </article>
                                            </li>								
                                         </ul>
                                    </section>
								</div>
        <?
	}
}
?>