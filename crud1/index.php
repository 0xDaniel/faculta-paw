<?php  include('server.php'); ?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>

<?php $results = mysqli_query($db, "SELECT * FROM persoane"); ?>

<table>
	<thead>
		<tr>
			<th>Nume</th>
			<th>Prenume</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['nume']; ?></td>
			<td><?php echo $row['prenume']; ?></td>
			<td>
				<a href="index.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="server.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>

	<form method="post" action="server.php" >
		<div >
			<label>Nume</label>
			<input type="text" name="nume" value="">
		</div>
		<div class="input-group" >
			<label>Prenume</label>
			<input type="text" name="prenume" value="">
		</div>
		<divclass="input-group">
        <?php if ($update == true): ?>
	<button class="btn" type="submit" name="update" style="background: #556B2F;" >Editeaza</button>
<?php else: ?>
	<button class="btn" type="submit" name="save" >Adauga</button>
<?php endif ?>
		</div>
	</form>
</body>
</html>