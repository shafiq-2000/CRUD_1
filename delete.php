<?php
include 'connect.php';
$id=$_GET['idno'];
$delete = "DELETE FROM users WHERE ID = $id";
$query = mysqli_query($connect,$delete);

if($query){
    echo "<script>alert('data delete successfuly') </script>";
    header("location:index.php");
}else{
    echo "<script>alert('data delete failed') </script>";
}

?> 