<?php
include 'connect.php';
$id = $_GET['idno'];

$read = "select * from users where Id=$id";
$query = mysqli_query($connect,$read);
$row = mysqli_fetch_array($query);

if(isset($_POST['edit'])){
    $name = $_POST['myname'];
    $email = $_POST['myemail'];
    $phone = $_POST['myphone'];
    $password = $_POST['mypassword']; 

$update = "UPDATE users SET 
name = '$name', 
email ='$email',
phone ='$phone',
password ='$password' where Id = $id";

$query = mysqli_query($connect, $update);
if($query){
    echo "<script>alert('data edit succss') </script>";
    header("location:index.php");
}else{
    echo "<script>alert('data edit failed') </script>";
}

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD|OPERATION</title>

    <!-- font awesome -->
    <link rel="stylesheet" href="css/all.min.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- main css  -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">

</head>
<body class="container text-center">

   <div class="col-sm-4 shadow">
                <!-- form start -->
                <form action="" method="POST" class=" ">
                <div class="card-body">
                <h1 class=" text-center text-primary py-5">Edit data</h1>
                    <div class="form_group ">
                        <div class="form-group mb-4">
                            <input type="text" value="<?php echo $row['name'] ?>" name="myname" class="form-control" placeholder="Enter Your name">

                        </div>
                        <div class="form-group mb-4">
                            <input type="email" value="<?php echo $row['email'] ?>" name="myemail" class="form-control" placeholder="Enter Your email">

                        </div>
                        <div class="form-group mb-4">
                            <input type="phone" value="<?php echo $row['phone'] ?>" name="myphone" class="form-control" placeholder="Enter Your phone">

                        </div>
                        <div class="form-group mb-4">
                            <input type="password" value="<?php echo $row['password'] ?>" name="mypassword" class="form-control "
                                placeholder="Enter Your password">


                            <div class="text-center form-group mt-5">
                                <button type="submit" name="edit" class="btn btn-primary " ><i class="fa fa-save" aria-hidden="true"></i> save</button>
                            </div>
                </form>

                <!-- font awesome -->
    <script src="js/all.min.js"></script>
    <!-- bootstrap -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <!-- main js  -->
    <script src="js/main.js"></script>

</body> 
</html>