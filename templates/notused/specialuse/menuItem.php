<?php
# menuItem.php
#
# This special-use puzzle piece is used in menu pages and displays info
# about a single menu item. It assumes the variable $currentMenuItem is in scope.
?>
				<li>
							<h2><a href="<?=$_SERVER['REQUEST_URI']?>"><?=$currentMenuItem['name']?></a></h2>
							<p><?=$currentMenuItem['blurb']?></p>
							<span class="price">
							<?php
							# render the price as either whole dollars ($1), dollars+cents ($1.99), or just cents (99c)
							
							# tries to match for cents (eg, 99c)
							if($currentMenuItem['price'] < 1.00) echo intval($currentMenuItem['price']*100)."&cent;";
							
							# cheap crude test for whole number (eg $1)
							elseif( intval($currentMenuItem['price']) == $currentMenuItem['price'] ) echo '$'.intval($currentMenuItem['price']);
							
							# failsafe (other amounts eg, $1.99)
							else echo '$'.sprintf("%0.2f",$currentMenuItem['price']);
							?></span>
						</li>
