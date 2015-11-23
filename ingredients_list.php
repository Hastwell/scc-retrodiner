<?php
####################################
# ingredients_list.php
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
		<h2><a href="about.php">In Stock</a></h2>
		<p>
			<table>
				<?php /* print table headers */ printTableRow(array("Picture", "Item Name", "In Stock"), 'th'); ?>
				<?php
					// get DB connection and output brief inventory table
					$db = new mysqli($dbHost, $dbUser, $dbPassword, $dbDatabase);
					if($db->connect_errno > 0){
					    die('Unable to connect to database [' . $db->connect_error . ']');
					}
					
					$sql = <<<SQLSTATEMENT
					SELECT inventoryID, inventoryImagePath, inventoryQuantity, manufacturerName, inventoryProductName FROM inventory
					INNER JOIN manufacturers ON inventory.manufacturer = manufacturers.manufacturerID;
SQLSTATEMENT;
					
					
					if(!$result = $db->query($sql))
					{
					    die('Error searching database [' . $db->error . ']');
					}
					
					while($row = $result->fetch_assoc())
					{
					    printTableRow(
					    	array(
					    		'<img src="' . htmlspecialchars( $baseImgPath . $row['inventoryImagePath'] ) . '" style="height: 64px" />',
					    		'<a href="ingredient_detail.php?id='.htmlspecialchars($row['inventoryID']). '">'. htmlspecialchars( $row['inventoryProductName'] ) . "<br /><i>" . htmlspecialchars( $row['manufacturerName'] ) . "</i></a>",
					    		$row["inventoryQuantity"]
					    	     )
					    ); // end printTableRow
					    
					}

				?>
			</table>
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
