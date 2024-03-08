<?php
    session_start();
    if(isset($_SESSION["user"])){
        header("Location: contact.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="css/login.css">
</head>

    <div class="container">
        <?php
            if(isset ($_POST["login"])){
                $email = $_POST["Email"];
                $password = $_POST["Password"];
                    require_once "database.php";
                    $sql = "SELECT * FROM user WHERE email = '$email'";
                    $result = mysqli_query($conn, $sql);
                    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    if ($user) {
                        if(password_verify($password, $user["Password"])){
                            $_SESSION["user"] = "yes";
                            header("Location: index.php");
                            die();
                        }
                    } else {
                        echo "<div class = 'alert alert-danger'> Email does not match </div>";
                    }
            }
        ?>

        <form action="index.php" method="post">
            <div class="form-group">
                <label for="email">Email: </label>
                <input type="email" name="Email" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="password">Password: </label>
                <input type="password" name="Password" class="form-control" required>
            </div>

            <div class="form-btn">
                <input type="submit" value="Login" name="Login" class="btn btn-primary">
            </div>
        </form>

        <div><p> Not Registered yet? <a href="registration.php"> Register Here</a></div>



    </div>
    
</body>
</html>