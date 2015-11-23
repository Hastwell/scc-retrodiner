<?php

# include the puzzle piece ordering used in the existing template system
include('./templates/puzzlePieceOrdering.php');
include('./includes/dbconf.php');

# the path fragment all A6 files are stored in. Appended to ['url'] in pageDetails lookup table entries to determine title, pageID, etc when this site is in a subdir instead of owning docroot.
# XXX change this when uploading to production as it uses a virtualhost to stand for the ITC240 directory.
$baseUrl = '/itc240/a9-listview/';
$baseImgPath = 'images/inventory/';
#$baseUrl = '/sandbox-151103/a6-dynamicContent/';

$pageDetails = array(
	# pageType chooses the set of Puzzle Pieces that will be used by my Modular Templating System
	# navbar_linkTitle is optional; if not set, this entry will not be added to the navbar
	
	# the URL '' is a special case for specifing the index.php by it's directory name
	'Default' => array('url' => null, 'title' => "Default Title for {$_SERVER["PHP_SELF"]}", 'pageType' => 'about'),
	'AllInventory' => array('url' => 'ingredients_list.php', 'title' => 'Supplies Inventory', 'pageType' => 'about', 'navbar_linkTitle' => 'All Inventory'),
	'Details' => array('url' => 'ingredient_detail.php', 'title' => 'Supply Detail', 'pageType' => 'about', 'navbar_linkTitle' => 'Details'),
); // end pageDetails array.


$currentPageId = 'Default';

foreach( $pageDetails as $iterPageId => $iterPageDetails )
{
	if($baseUrl.$iterPageDetails['url'] === $_SERVER['PHP_SELF'])
	{
		$currentPageId = $iterPageId;
		break;
	}
}


$currentPage = $pageDetails[$currentPageId];

$pageType = $currentPage['pageType'];
$pageTitle = $currentPage['title'];

