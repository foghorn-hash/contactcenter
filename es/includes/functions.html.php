<?php 

/**
 * Teknologiaplaneetta - Enterprise Solution
 *
 * LICENSE: Open Source (GNU GPL)
 *
 * @copyright  2007 Teknologiaplaneetta
 * @license    http://www.gnu.org/copyleft/gpl.html  GNU GPL Version 2
 * @version    $Id$ 1.0.0
 * @link       http://www.teknologiaplaneetta.com
 */ 

if (!defined($secretkey)) { die("Please use index.php!"); }

function startprototype ($sptype) {
global $url_prefix, $links, $lang;
    if (!isset($links)) { $links = ""; }
	if ($sptype == 1){
	echo "\n <div id=\"container\">
	  <div id=\"header\">
	  <table width=\"100%\" border=\"0\"  cellspacing=\"0\" cellpadding=\"0\" id=\"header-td\">
  <tr>
    <td valign=\"middle\">
	  ".$links
	  ."</td>
  </tr>
</table>
	  </div>
      <div id=\"content\">
	\n ";}
}

function endprototype ($eptype) {
if ($eptype == 1){
echo "</div></div> \n \n";

?>

<script type="text/javascript">

	//scripts have been put here as a courtesy to you, the sourcecode viewer.
	
	//this script uses mootools: http://mootools.net
	
	var stretchers = $$('div.accordion');
	var togglers = $$('h3.toggler');

	stretchers.setStyles({'height': '0', 'overflow': 'hidden'});
	
	window.addEvent('load', function(){
		
		//initialization of togglers effects
		
		togglers.each(function(toggler, i){
			toggler.color = toggler.getStyle('background-color');
			toggler.$tmp.first = toggler.getFirst();
			toggler.$tmp.fx = new Fx.Style(toggler, 'background-color', {'wait': false, 'transition': Fx.Transitions.Quart.easeOut});
		});
		
		//the accordion
		
		var myAccordion = new Accordion(togglers, stretchers, {
			
			'opacity': false,
			
			'start': false,
			
			'transition': Fx.Transitions.Quad.easeOut,
			
			onActive: function(toggler){
				toggler.$tmp.fx.start('transparent');
				toggler.$tmp.first.setStyle('color', '#888');
			},
		
			onBackground: function(toggler){
				toggler.$tmp.fx.stop();
				toggler.setStyle('background-color', toggler.color).$tmp.first.setStyle('color', '#000');
			}
		});
		
		//open the accordion section relative to the url
		
		var found = 0;
		$$('h3.toggler a').each(function(link, i){
			if (window.location.hash.test(link.hash)) found = i;
		});
		myAccordion.display(found);
		
		//the draggable ball
		
		var ball = $('header').getElement('h1');
		var ballfx = new Fx.Styles(ball, {duration: 1000, 'transition': Fx.Transitions.Elastic.easeOut});
		new Drag.Base(ball, {
			onComplete: function(){
				ballfx.start({'top': 13, 'left': 358});
			}
		});
		
	});
	
</script>

<?php

}
}


function startupdowntab ($suptitle, $stitle, $sstyle, $sclass) {
echo "\n"
.'<h3 style="'.$sstyle.'" class="toggler '.$suptitle.'"><a href="#'.$suptitle.'" style="'.$sclass.'">'.$stitle.'</a></h3><div class="accordion">'
."\n";
}

function endupdowntab () { echo "</div>\n"; }


function starttabpane ($tbtitle) { echo "<div class=\"tab-pane\" id=\"".$tbtitle."\">\n"; }

function endtabpane () { echo "</div>\n"; }

function starttabpage ($tabpage) {
echo "<div class=\"tab-page\">
      <h2 class=\"tab\">".$tabpage."</h2>\n";
}


function endtabpage () { echo "</div>\n"; }

function startsubtabpage ($tabpage) {
echo "<div class=\"tab-page\" style=\"border: 0px; padding: 0px; margin: 0px; top: 0px;\">
      <h2 class=\"tab\">".$tabpage."</h2>\n";
}

function endsubtabpage () { echo "</div>\n"; }

function checkallscript () {

echo "\n\n<script language=\"JavaScript\" type=\"text/javascript\"> 
function all(form) { 
\n\n
  for (var i = 1; i < form.elements.length; i++) {    
\n\n
    eval(\"form.elements[\" + i + \"].checked = form.elements[0].checked\");  
\n\n
  } 
\n\n
} \n
</script>\n\n"; 

}

function checkallbox () {
echo "\n<input name=\"aa\" type=\"checkbox\" onClick=\"all(this.form);\" />\n";
}

?>
