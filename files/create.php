
<?php
include 'header.php';
include 'data.php';
include 'database.php';

?>
<?php
$db = new DataBase();
if (isset($_POST['submit'])) {
	$name = mysqli_real_escape_string($db->link,$_POST['name']);
	$Dept = mysqli_real_escape_string($db->link,$_POST['Dept']);
	$phone = mysqli_real_escape_string($db->link,$_POST['phone']);
	if ($name == ''|| $Dept == '' || $phone == '') {
		$error = "Field Must not be available";
	}
	else
	{
		$query = "INSERT INTO information(name,Dept,phone) VALUES ('$name','$Dept','$phone')";
		$create = $db->insert($query);
	}
}

?>
<form action="create.php" method="POST" class=" py-3 text-center">
	<table class="text-center col-md-8">
		<tr class="col-md-8">
			<td>Name</td>
			<td><input type="text" name="name" placeholder="Enter Your Name" class="form-control"></td><br>
		</tr>
		<tr>
			<td>Department</td>
			<td><input type="text" name="Dept" placeholder="Enter Your Department" class="form-control"></td>
		</tr>
		<tr>
			<td>Phone</td>
			<td><input type="phone" name="phone" placeholder="Enter Your Phone" class="form-control"></td>
		</tr>

		<tr class="my-5">
			<td></td>
			<td>
				<input type="submit" name="submit" value="Submit" class="btn btn-secondary">
				<input type="reset" name="reset" value="Cancel" class="btn btn-danger">

			</td>
		</tr>

	</table>
	
</form>













<a href="index.php" class="markst"><-Back</a>










<?php

include 'footer.php';
?>