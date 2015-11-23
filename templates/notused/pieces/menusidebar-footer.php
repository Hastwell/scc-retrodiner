<?php include_once('./templates/echoActiveLink.php') ?>
		<div class="sidebar">
			<h1>Menu</h1>
			<ul class="navigation">
				<li class="first">
					<a <?php echoActiveLinkIfNeeded('burger.php'); ?> href="burger.php">BURGERS</a>
				</li>
				<li>
					<a <?php echoActiveLinkIfNeeded('hotdog.php'); ?> href="hotdog.php">HOTDOGS</a>
				</li>
				<li>
					<a <?php echoActiveLinkIfNeeded('shake.php'); ?> href="shake.php">SHAKES</a>
				</li>
				<li>
					<a <?php echoActiveLinkIfNeeded('breakfast.php'); ?> href="breakfast.php">BREAKFAST</a>
				</li>
			</ul>
			<a href="hotdog.php" class="download">&nbsp;</a>
		</div>
