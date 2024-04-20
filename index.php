<?php 
include 'connect.php';

// data insert

if(isset($_POST['adduser'])){
    $name = $_POST['myname'];
    $email = $_POST['myemail'];
    $phone = $_POST['myphone'];
    $password = $_POST['mypassword'];

    //email validation line number 13,14,15
    // $email_select = "SELECT * FROM users WHERE email = '$email'";
    // $exe = mysqli_query($connect,$email_select);
    //  $count = mysqli_num_rows($exe);

    //phone validation line number 18,19,20
    $phone_select = "SELECT * FROM users WHERE phone = '$phone'";
    $exe = mysqli_query($connect,$phone_select);
    $count= mysqli_num_rows($exe);

     if($count>0){
        echo "<script>alert('email/phone alredy  exits') </script>";
     }else{

         $query = "INSERT INTO users(name,email,phone,password)
         VALUES ('$name','$email','$phone','$password')";
     
        $insert =  mysqli_query($connect , $query);
        if($insert){
         echo "<script>alert('data success') </script>";
        }else{
         echo "<script>alert('data fail') </script>";
        }
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

<body>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="display-2 bg-danger text-light text-center py-4">CRUD OPERATION</h1>
            </div>
        </div>
        <div class="mt-4 row">
            <div class="col-lg-8">



<!-- data fetch -->

<h1 class="text-danger text-center">Fetch data</h1> <br>
<table class="table table-striped">

    <th>ID</th>
    <th>Name</th>
    <th>Email</th> 
    <th>Phone</th>
    <th>Edit</th>
    <th>Delete</th>
    <?php
$read = "select * from users";
$query = mysqli_query($connect,$read);

// database a koyta row ase ta show korar jnno niser 2 line use kora hy
// $count=mysqli_num_rows($query);
// echo " <h3>total database rows </h3>" . $count;

while($row = mysqli_fetch_array($query)){?>
    
    <tr>
        <td><?php echo $row["id"] ?></td>
        <td><?php echo $row["name"] ?></td>
        <td><?php echo $row["email"] ?></td>
        <td><?php echo $row["phone"] ?></td>
        <td> <a href="edit.php?idno=<?php echo $row["id"] ?>">Edit</a></td>
        <td> <a onclick="return confirm('Are you sure')" href="delete.php?idno=<?php echo $row["id"] ?>">Delete</a></td>
        
        
       
    </tr>

    <?php }
?>
        </table>
            </div>
      
            


            <div class="col-lg-4 shadow">
                <!-- form start -->
                <form action="" method="POST" class=" ">
                <h1 class=" text-center text-primary py-5">User Info</h1>
                    <div class="form_group ">
                        <div class="form-group mb-4">
                            <input type="text" name="myname" class="form-control" placeholder="Enter Your name">

                        </div>
                        <div class="form-group mb-4">
                            <input type="email" name="myemail" class="form-control" placeholder="Enter Your email">

                        </div>
                        <div class="form-group mb-4">
                            <input type="phone" name="myphone" class="form-control" placeholder="Enter Your phone">

                        </div>
                        <div class="form-group mb-4">
                            <input type="password" name="mypassword" class="form-control "
                                placeholder="Enter Your password">


                            <div class="text-center form-group mt-5">
                                <button type="submit" name="adduser" class="btn btn-primary " >ADD USER</button>
                            </div>
                </form>



            </div>
        </div>
    </div>



    <!-- font awesome -->
    <script src="js/all.min.js"></script>
    <!-- bootstrap -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <!-- main js  -->
    <script src="js/main.js"></script>


</body>

</html>
