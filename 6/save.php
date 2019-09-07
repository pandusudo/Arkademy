<?php
require_once "config/koneksi.php";

if (isset($_POST['save'])) {
    if(empty($_POST['nama']) || empty($_POST['work'])){
      echo '<script type="text/javascript"> alert("Nama dan pekerjaan harus diisi!");</script>';
      echo '<script type="text/javascript"> window.location.replace("index.php")</script>';
    }else {
      $nama = $conn->real_escape_string($_POST['nama']);
      $work = $conn->real_escape_string($_POST['work']);
	  
	  if(empty($_POST['salary'])){
		$query = "select id_salary from work where id = '$work'";
		$result = $conn->query($query);
		$row = $result->fetch_assoc();
		$salary = $row['id_salary'];
		  
		$query = "INSERT into nama values(null,'$nama','$work','$salary')";
		if(!$conn->query($query)){
			echo '<script type="text/javascript"> alert("Error Query!");</script>';
			echo '<script type="text/javascript"> window.location.replace("index.php")</script>';
		}else {
			echo '<script type="text/javascript"> alert("Data Berhasil Dimasukkan!");</script>';
			echo '<script type="text/javascript"> window.location.replace("index.php")</script>';
		}
	  }else{
		$salary = $conn->real_escape_string($_POST['salary']);
		  
		$query = "INSERT into nama values(null,'$nama','$work','$salary')";
		if(!$conn->query($query)){
			echo '<script type="text/javascript"> alert("Error Query!");</script>';
			echo '<script type="text/javascript"> window.location.replace("index.php")</script>';
		}else {
			echo '<script type="text/javascript"> alert("Data Berhasil Dimasukkan!");</script>';
			echo '<script type="text/javascript"> window.location.replace("index.php")</script>';
		}
	  }
    }
}
 ?>
