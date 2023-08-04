
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LANDROOF Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
 <link rel="stylesheet" href="style.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  <body>


<div class="container">
    <div class="row my-5 justify-content-center ">
        <div class="col-sm-12 col-md-4 Signincard">
            <h1>SIGN IN</h1>
            <div class="bottomLine"></div>
            <form action="<?php echo ($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group">
                    <label for="username">Username </label>
                    <input type="text" class="form-control" name="username" placeholder="Username or Email" >
                </div>
                <div class="form-group">
                    <label for="password">Password </label>
                    <input type="password" class="form-control" name="password"  placeholder="Password" >
                </div>
                <div class="form-group text-center py-4">
                    <button class="btn px-5" name="submit">SIGN IN</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>



<?php 
include 'conn.php';

if(isset($_POST["submit"])){
   
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, ($_POST['password']));
    
    $sql = "SELECT * FROM auth WHERE email = '{$username}' OR username = '{$username}' AND password = '{$password}' ";
    
     $result = mysqli_query($conn, $sql) or die(mysqli_error());
       if (mysqli_num_rows($result) > 0) {
    
        while($row = mysqli_fetch_assoc($result)){
            
            session_start();
            $_SESSION['auth_id'] = $row["auth_id"];
            $_SESSION['full_name'] = $row["full_name"];
            $_SESSION['username'] = $row["username"];
            $_SESSION['email'] = $row["email"];
            
            echo     "<script>alert('succesfull') </script>";
        header("location:dashboard.php");
        }
    
    }else{
        
        echo "<script>alert('Please Try After Some Time'); </script>";
    }


}


?>

