<?php
function echoActiveLinkIfNeeded($validpages)
{
	/* if the current page is either
		a) in the supplied array, or
		b) is the supplied string
	   ...then add the Active class
	 */
	if(
		(is_array($validpages) && in_array(basename($_SERVER["SCRIPT_FILENAME"]), $validpages))
			||
		(is_string($validpages) && basename($_SERVER["SCRIPT_FILENAME"]) == $validpages)
	  )
	  {
	  	print ' class="active" ';
	  }
}
