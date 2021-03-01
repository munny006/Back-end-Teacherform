
<?php
include 'header.php';
include 'data.php';
include 'database.php';

?>
<?php
$id = $_GET['id'];
  $db = new DataBase();
  $query = "SELECT *FROM information WHERE id=$id";
  $getData = $db->select($query)->fetch_assoc();

  if (isset($_POST['submit'])) {
  		$name  =  mysqli_real_escape_string($db->link,$_POST['name']);
  		$Dept =  mysqli_real_escape_string($db->link,$_POST['Dept']);
  		$phone =  mysqli_real_escape_string($db->link,$_POST['phone']);
  		if ($name == ''|| $Dept == '' || $phone == '') {
  			$error = "Field must not be empty";
  		}
  		else
  		{
  			$query ="UPDATE information 
  			SET 
  			name = '$name',
  			dept = '$Dept',
  			phone = '$phone'
  			WHERE id = $id";
  			$update = $db->update($query);
  		}
  }


?>
<?php

if (isset($_GET['error'])) {
	echo $_GET['error'];
}

?>
<?php

if (isset($_POST['delete'])) {
	$query = "DELETE FROM information
	WHERE id = $id";
	$deleteData = $db->delete($query);
}

?>


<form action="update.php?id=<?php echo $id ;?>" method="POST" class=" py-3 text-center">
	<table class="text-center col-md-8">
		<tr class="col-md-8">
			<td>Name</td>
			<td><input type="text" name="name" value="<?php echo   $getData['name'];?>" class="form-control"></td><br>
		</tr>
		<tr>
			<td>Department</td>
			<td><input type="text" name="Dept"value="<?php echo   $getData['Dept'];?>"class="form-control"></td>
		</tr>
		<tr>
			<td>Phone</td>
			<td><input type="tel" name="phone"value="<?php echo   $getData['phone'];?>"class="form-control"></td>
		</tr>

		<tr class="my-5">
			<td></td>
			<td>
				<input type="submit" name="submit" value="Update" class="btn btn-secondary">
				
				<input type="submit" name="delete" value="Delete" class="btn btn-danger">
			</td>
		</tr>

	</table>
	
</form>


<a href="index.php" class="markst"><-Back</a>









<?php

include 'footer.php';
?>