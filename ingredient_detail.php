<?php
####################################
# ingredients_detail.php
# Retro Diner
#
# Hastwell
###################################
require('./templates/config.php');
include('./templates/header.php');
function mkLabel($for, $text)
{
	return "<label for=\"$for\" class=\"frmLabel\">$text</label>";
}

function mkTextlikeBox($fieldname, $fieldLabel, $fieldtype = "text")
{
	return "<p>\n\t\t\t\t".mkLabel("frm_$fieldname", $fieldLabel)."\n\t\t\t\t<br />\n\t\t\t\t<input type=\"$fieldtype\" id=\"frm_$fieldname\" name=\"$fieldname\" required=\"required\" size=\"40\"/>\n\t\t\t</p>";
}


function mkSelect($name, $options)
{
	$rtrn = '<select name="'.$name.'">';
	foreach($options as $key => $value)
	{
		$rtrn .= "<option value=\"$key\">$value</option>";
	}
	$rtrn .= "</select>";
	return $rtrn;
}

function mkCheckboxes($name, $title, $options, $boxType="checkbox",$defaultCheckbox = null)
{
	$rtrn = "<p>\n\t\t\t\t$title";
	foreach($options as $key => $value)
	{
		$rtrn .= "\n\t\t\t\t<br />\n\t\t\t\t<input type=\"$boxType\" name=\"$name\" value=\"$key\" id=\"chkbx_{$name}_$key\"". ($defaultCheckbox === $key? " checked=\"true\"" : "") ." />" . mkLabel("chkbx_{$name}_$key", $value)."\n\t\t\t\t";
	}
	$rtrn = substr($rtrn, 0, strlen($rtrn) - 1)."</p>";
	return $rtrn;
}

function mkTable($headers, $rowdata)
{
	echo "\t\t<table>\n";
	printTableRow($headers, 'th');
	foreach($rowdata as $currow) printTableRow($currow);
	echo "\t\t</table>\n";
	
}

function printTableRow($rowdta, $tag = "td")
{
	echo "\t\t\t<tr>\n";
	foreach($rowdta as $currentCol)
	{
		$imgDelimiter = 'img:';
		if( strpos( $currentCol, $imgDelimiter) === 0) $currentCol = '<img src="'. substr($currentCol, strlen($imgDelimiter)) . '" width="100" alt="' .$rowdta[1]. '"/>';
		echo "\t\t\t\t<$tag>$currentCol</$tag>\n";
	}
	echo "\t\t\t</tr>\n";
}


?>
<ul>
	<li>
		<p>
				<?php
					// get DB connection and output brief inventory table
					$db = new mysqli($dbHost, $dbUser, $dbPassword, $dbDatabase);
					if($db->connect_errno > 0){
					    die('Unable to connect to database [' . $db->connect_error . ']');
					}
					
					$sql = <<<SQLSTATEMENT
					SELECT manufacturerName, manufacturerEmail, manufacturerContactNum, inventoryItemCode, inventoryProductName, inventoryQuantity, inventoryUPC, inventoryImagePath FROM inventory
					INNER JOIN manufacturers ON inventory.manufacturer = manufacturers.manufacturerID
					WHERE inventoryId = ?;
SQLSTATEMENT;
					if(! $query = $db->prepare($sql) )
						die( "Prepare failed: (" . $db->errno . ") " . $db->error );
					$query->bind_param('i', intval($_GET['id']));
					if(!$result = $query->execute())
					{
					    die('Error searching database [' . $db->error . ']');
					}
					
					$result = $query->get_result();
					
					if($row = $result->fetch_assoc())
					{
						// if we have a result, print it
						echo '<h1>' .htmlspecialchars($row["inventoryProductName"]). '</h1>';
						echo '<img src="'. htmlspecialchars( $baseImgPath . $row['inventoryImagePath'] ) . '" style="max-width: 70%" />';
						echo '<h2>Manufacturer Details</h2>';
						echo "<ul><li>Manufacturer: " . htmlspecialchars($row['manufacturerName']) . "</li><li>Phone: <a href=\"tel:". htmlspecialchars($row['manufacturerContactNum']) ."\">" .htmlspecialchars($row['manufacturerContactNum'])."</a></li><li>Email: <a href=\"mailto:" .htmlspecialchars($row['manufacturerEmail']). "\">".htmlspecialchars($row['manufacturerEmail']). "</a></ul>";
						
						echo "<h2>Item Details</h2>";
						echo "<ul><li>Item Name: " .htmlspecialchars($row['inventoryProductName']). "</li><li>Item Code: " .htmlspecialchars($row['inventoryItemCode']). "</li><li>UPC Code: <img src=\"upc.php?code=" .htmlspecialchars($row['inventoryUPC']). '" align="top" />' .htmlspecialchars($row['inventoryUPC']) . '</li><li>Quantity Available: ' .htmlspecialchars($row['inventoryQuantity']). '</li></ul>';
					}

				?>
			<?php /*mkTable(
				array("Picture", "Item Code", "UPC", "Quantity", "Manufacturer", "Item Name"),
				array(array("[IMG]", "DGLD001", '<img src="upc.php?code=3900449033" /><br>3900449033', "x193", "Wairywold Dairy", "Milk")) //* no rows *
			);*/
			/*mkTable(
				array("Picture", "In Stock", "Item Name"),
				array(array("[IMG]", "x64", "Wairywold Dairy Milk"))
			);*/
			
			?>	
		</p>
	</li>
	<li>
	</li>
</ul>
<!-- begin footer -->
<?php include('./templates/footer.php'); ?>
