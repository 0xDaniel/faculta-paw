<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'crud1');

	// initialize variables
	$nume = "";
	$prenume = "";
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$nume = $_POST['nume'];
		$prenume = $_POST['prenume'];

		mysqli_query($db, "INSERT INTO persoane (nume, prenume) VALUES ('$nume', '$prenume')"); 
		$_SESSION['message'] = "prenume saved"; 
		header('location: index.php');
		
	}
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM persoane WHERE id=$id");

		if (count(array($record)) == 1 ) {
			$n = mysqli_fetch_array($record);
			$nume = $n['nume'];
			$prenume = $n['prenume'];
		}
	}

	if (isset($_POST['update'])) {
		$id = $_POST['id'];
		$nume = $_POST['nume'];
		$prenume = $_POST['prenume'];
	
		mysqli_query($db, "UPDATE persoane SET nume='$nume', prenume='$prenume' WHERE id=$id");
		$_SESSION['message'] = "prenume updated!"; 
		header('location: index.php');
	}

	if (isset($_GET['del'])) {
		$id = $_GET['del'];
		mysqli_query($db, "DELETE FROM persoane WHERE id=$id");
		$_SESSION['message'] = "prenume deleted!"; 
		header('location: index.php');
	}