<?php

include("connect.php");

$name = $email = $password = $con_password = "";
$email_err = $password_err = $con_pass_err = "";

if($_SERVER["REQUEST_METHOD"]=='POST')
{
    $name = $_POST["name"];


    $sql = "select id from user where email = ?";
    if($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_bind_param($stmt,"s",$param_email);
        $param_email = $_POST["email"];

        if(mysqli_stmt_execute($stmt)){
            mysqli_stmt_store_result($stmt);

            if(mysqli_stmt_num_rows($stmt) == 1)
            {
                $email_err = "Email already exists.";
            }
            else{
                $email = $_POST["email"];
            }
        }
    }
}






?>

<!Doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial_scale=1.0">
        <title>Sign up</title>
        <link href="../css/style.css" rel="stylesheet">

        <style>
            label{
                width:60px;
                display: inline-block;
                color:#ffff00;
            }
            </style>
    </head>
    <body style="background-color:#000000">
    
    <h1 style="background-color: #ff0000">Sign up</h1>

    <div class = "form">

    <form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "POST">
    <div>
    <label>Name:</label>
    <input type = "text" name = "Name" required>
    <br><br>
    <label>Email</label>
    <input type="email" name="email" id="" required>
    <br><br>
    <label>Password:</label>
    <input type="password" name="password" id="" required>
    <br><br>
    <label>Confirm Password:</label>
    <input type="password" name="conpass" id="" required>
    <br><br>
    <input type = "submit" value = "Submit">
    <br>
    <p><?php echo $error?></p>

    </form>

    </div>
    </body>
</html>