<?php
    session_start();
    include("config.php");
    $edit = $_GET['edit'];
    $fetch = mysqli_query($con,"select * from users where id='$edit'");
    $row = mysqli_fetch_array($fetch);
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
    <form method="post">
                <div class="mb-3">
                    <label>Name</label>
                    <input type="text" name="name" value="<?php echo $row['name'];?>" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" value="<?php echo $row['email'];?>" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" name="password" value="<?php echo $row['password'];?>" class="form-control">
                </div>
                <button type="submit" name="update" class="btn btn-primary">Submit</button>
            </form>
    </body>
    </html>
    <?php
    if(isset($_POST['update'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $update = mysqli_query($con,"update users set name='$name',email='$email',password='$password' where id='$edit'");
        if($update){
            $_SESSION['user_email'] = $email;
            header("location: index.php");
        }
        else{
            echo "update nhi hua";
        }
    }

?>