<?php
# header.php
# RetroDiner for ITC240
#
# This page will string together several puzzle pieces based on a variable in
# the main page ($pageType). This links to the arrays $_headerPieces and $_footerPieces
# which contain what order puzzle pieces they are included in.
#
# $pageType is a global (include files inherit the scope of wherever they are included in), so
# this script will have access to it as well

# if there is no template by the selected name, fail to default
if(!isset($_headerPieces[$pageType]))
{
	$pageType = 'default';
	trigger_error("Use of undefined template \"$pageType\"; using default.", E_USER_WARNING);
}

foreach( $_headerPieces[$pageType] as $currentPuzzlepiece )
{
	include "./templates/pieces/$currentPuzzlepiece-header.php";	
}
