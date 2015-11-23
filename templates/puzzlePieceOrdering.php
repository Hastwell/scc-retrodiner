<?php


$_headerPieces = array(
	'default' => array('main'),
	'about' => array('main', 'about'),
	'contact' => array('main', 'menu'),
	'menu' => array('main', 'menu')
);

$_footerPieces = array(
	'default' => array('main'),
	'about' => array('about', 'main'),
	'contact' => array('about', 'aboutus_sidebar', 'main'),
	'menu' => array('about', 'menusidebar', 'main')
);

# ensure $pageType always has a default value for lookup purposes
$pageType = isset($pageType)? $pageType : 'default';

