<?php
include 'connection.php';
if (isset($_GET['q'])) 
{
	$dci=$_GET['q'];
	 $qry_design=mysql_query("SELECT * FROM `prod_design_details` WHERE `cat_id`='$dci'");
	 while ($row=mysql_fetch_array($qry_design)) 
     {
    ?>
		<option value="<?php echo $row['design_id']; ?>"><?php echo $row['design_name']; ?></option>
    <?php
     }
}
?>

