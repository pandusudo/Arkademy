<?php
require_once "config/koneksi.php";

$kode = $_GET['kode'];

if (isset($_POST['update'])) {
    if(empty($_POST['nama']) || empty($_POST['work']) || empty($_POST['salary'])){
      echo '<script type="text/javascript"> alert("Data Harus Terisi Semua!");</script>';
      echo '<script type="text/javascript"> window.location.replace("index.php")</script>';
    }else{
      $work = $conn->real_escape_string($_POST['work']);
      $nama = $conn->real_escape_string($_POST['nama']);
      $salary = $conn->real_escape_string($_POST['salary']);

      $query = "UPDATE nama set nama='$nama', id_work='$work', id_salary='$salary' where id='$kode'";
      if (!$conn->query($query)) {
        echo '<script type="text/javascript">alert("Error Query!")</script>';
        echo '<script type="text/javascript"> window.location.replace("index.php")</script>';
      }else{
        echo '<script type="text/javascript">alert("Berhasil Mengedit Data!")</script>';
        echo '<script type="text/javascript"> window.location.replace("index.php")</script>';
      }
    }
}
 ?>
