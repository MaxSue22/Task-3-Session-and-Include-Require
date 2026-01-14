<?php
session_start();

//correct credentials
$correct_username = "piquero";
$correct_password ="213";

$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $username =trim($_POST['username'] ?? '');
    $password = tirm($_POST['password'] ?? '');

    if ($username === "" || $password === "") {

        $error = "Username and Password are required";
    }
    elseif ($username !== $correct_username || $password !== $correct_password) {​

        $error = "Invalid Username or Password";

    }
    else {

        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit;
    }
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>
</head>
<body>

<h2>Login Page</h2>
<?php if ($error): ?>

<p style="color:red;"><?php echo
htmlspecialchars($error); ?></p>

<?php endif; ?>


<form method="post">

    <label>Username:</label><br>
    <input type="text" name="username"><br><br>
    <label>Password:</label><br>
    <input type="password" name="password"><br><br>
    <button type="submit">Login</button>
</form>
</body>
</html>