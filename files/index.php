
<?php
include 'header.php';
include 'data.php';
include 'database.php';

?>
<?php
$db = new DataBase();
$query = "SELECT * FROM  information";
$read = $db->select($query);

?>

<!--msg-->

<?php

if (isset($_GET['msg'])) {
	echo $_GET['msg'];
}

?>
<?php

if (isset($_GET['error'])) {
	echo $_GET['error'];
}

?>

<table class="table table-bordered text-center text-dark bg-light col-md-10">
	<tr>
		<th width="10%">Id</th>
		<th width="25%">Name</th>
		<th width="25%">Department</th>
		<th width="25%">phone</th>
		<th width="25%">Action</th>
	</tr>
	<?php if ($read) {?>

	
	<?php while($row = $read->fetch_assoc()){?>

		<tr>
			<td><?php echo $row['id']?></td>
		<td><?php echo $row['name']?></td>
		<td><?php echo $row['Dept']?></td>
		<td><?php echo $row ['phone']?></td>
		
		<td><a href="update.php?id=<?php echo urlencode($row['id']);?>" class = "text-dark" >Edit</a></td>
	</tr>
	<?php }?>
<?php }else {?>
	<p>Data not available..</p>
<?php }?>
</table>
<a href="create.php" class="markst">Create</a>










<?php

include 'footer.php';
?>