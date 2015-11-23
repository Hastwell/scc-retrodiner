<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<head>
	<title><?=$pageTitle?> - Retro Diner</title>
	<meta charset="utf-8">
	<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div id="header">
		<div>
			<a href="index.php"><img class="logo" src="images/logo.png" width="513" height="84" alt="" title=""></a>
			<a href="index.php"><img  src="images/waitress.png" width="332" height="205" alt="" title=""></a>
			<ul class="navigation">
				<?php
					foreach( $pageDetails as $iterPageId => $iterPageDetails )
					{
						if( isset( $iterPageDetails['navbar_linkTitle'] ) ) // has a link entry for this page?
						{
							/* allows literal HTML with loads of escapes inside of a foreach loop
							 * This creates each individual navbar element */
							?>
								<li><a href="<?=$iterPageDetails['url']?>"<?=($iterPageId === $currentPageId? ' class="active"' : '')?>><?=$iterPageDetails['navbar_linkTitle']?></a>
							<?php
						}
					}
				?>
				
			</ul>
		</div>
	</div>
	<div id="body">
<!-- end main header -->
