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

startprototype(1);

startupdowntab ('view1', "1", '', '');
echo "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. In venenatis. Nulla fringilla accumsan odio. Aenean lacinia. Fusce vestibulum accumsan mi. Maecenas a sapien et ligula ullamcorper suscipit. Vivamus augue enim, eleifend posuere, convallis sed, porttitor a, sapien. Vestibulum varius mauris eu nisl. Donec porta pulvinar dui. Vestibulum facilisis ultricies orci. In scelerisque ipsum vel eros. Praesent nisi. Nam sit amet libero vitae ipsum scelerisque fermentum. Duis leo turpis, posuere vehicula, suscipit sed, eleifend luctus, ipsum. Nam purus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Etiam velit dui, blandit vitae, tempor ac, adipiscing ac, lectus.";
endupdowntab();

startupdowntab ('view2', "2", '', '');
echo "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. In venenatis. Nulla fringilla accumsan odio. Aenean lacinia. Fusce vestibulum accumsan mi. Maecenas a sapien et ligula ullamcorper suscipit. Vivamus augue enim, eleifend posuere, convallis sed, porttitor a, sapien. Vestibulum varius mauris eu nisl. Donec porta pulvinar dui. Vestibulum facilisis ultricies orci. In scelerisque ipsum vel eros. Praesent nisi. Nam sit amet libero vitae ipsum scelerisque fermentum. Duis leo turpis, posuere vehicula, suscipit sed, eleifend luctus, ipsum. Nam purus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Etiam velit dui, blandit vitae, tempor ac, adipiscing ac, lectus.";
endupdowntab();

startupdowntab ('view3', "3", '', '');
echo "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. In venenatis. Nulla fringilla accumsan odio. Aenean lacinia. Fusce vestibulum accumsan mi. Maecenas a sapien et ligula ullamcorper suscipit. Vivamus augue enim, eleifend posuere, convallis sed, porttitor a, sapien. Vestibulum varius mauris eu nisl. Donec porta pulvinar dui. Vestibulum facilisis ultricies orci. In scelerisque ipsum vel eros. Praesent nisi. Nam sit amet libero vitae ipsum scelerisque fermentum. Duis leo turpis, posuere vehicula, suscipit sed, eleifend luctus, ipsum. Nam purus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Etiam velit dui, blandit vitae, tempor ac, adipiscing ac, lectus.";
endupdowntab();

startupdowntab ('view4', "4", '', '');
echo "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. In venenatis. Nulla fringilla accumsan odio. Aenean lacinia. Fusce vestibulum accumsan mi. Maecenas a sapien et ligula ullamcorper suscipit. Vivamus augue enim, eleifend posuere, convallis sed, porttitor a, sapien. Vestibulum varius mauris eu nisl. Donec porta pulvinar dui. Vestibulum facilisis ultricies orci. In scelerisque ipsum vel eros. Praesent nisi. Nam sit amet libero vitae ipsum scelerisque fermentum. Duis leo turpis, posuere vehicula, suscipit sed, eleifend luctus, ipsum. Nam purus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Etiam velit dui, blandit vitae, tempor ac, adipiscing ac, lectus.";
endupdowntab();

startupdowntab ('close', 'X', '', '');
endupdowntab();

endprototype(1); 

?>






<h3>
	We get signal! Mainscreen turn on!
</h3>
<p>
	<a id="reqTrigger" href="#" name="reqTrigger">Click here</a> to get signal
</p>
<div id="targetPanel">
	<p>
		[Maincreen is on]
	</p>
</div>
	<script type="text/javascript">
		window.addEvent('domready', function(){
			/* Tips 1 */
var Tips1 = new Tips($$('.Tips1'));

/* Tips 2 */
var Tips2 = new Tips($$('.Tips2'), {
	initialize:function(){
		this.fx = new Fx.Style(this.toolTip, 'opacity', {duration: 500, wait: false}).set(0);
	},
	onShow: function(toolTip) {
		this.fx.start(1);
	},
	onHide: function(toolTip) {
		this.fx.start(0);
	}
});

/* Tips 3 */
var Tips3 = new Tips($$('.Tips3'), {
	showDelay: 400,
	hideDelay: 400,
	fixed: true
});

/* Tips 4 */
var Tips4 = new Tips($$('.Tips4'), {
	className: 'custom'
});		});
	</script>
	Tips 3
</h3>Fixed tooltip: <a href="http://www.mootools.net" onclick="return false;" class="Tips3" title=
"Mootools official website">Mootools.net</a>
<h3>

