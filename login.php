<?php
session_start(); 

function clean_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$username = $password = "";
$usernameErr = $passwordErr = "*";
$loginErr = "";

try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["u"])) {
            throw new Exception("Masukkan username");
        } else {
            $username = clean_input($_POST["u"]);
        }

        if (empty($_POST["p"])) {
            throw new Exception("Masukkan password");
        } else {
            $password = clean_input($_POST["p"]);
        }

        if (empty($usernameErr) && empty($passwordErr)) {
            if (!empty($username) && !empty($password)) {
                $_SESSION['loggedin'] = true;
                header("Location: galery.php");
                exit; 
            } else {
                throw new Exception("Username atau password salah");
            }
        }
    }
} catch (Exception $e) {
    $loginErr = $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        .error {
            color: red;
            font-size: smaller;
        }
    </style>
</head>
<body>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    Username: <input type="text" name="u" value="<?php echo $username; ?>">
    <span class="error"><?php echo $usernameErr; ?></span>
    <br><br>
    Password: <input type="password" name="p">
    <span class="error"><?php echo $passwordErr; ?></span>
    <br><br>
    <span class="error"><?php echo $loginErr; ?></span>
    <br><br>
    <input type="submit" value="Login">
</form>

</body>
</html>