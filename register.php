<?php

$message = "";
$messageClass = "";

if (isset($_POST['register'])) {

    $username = htmlspecialchars(
        trim($_POST['username']),
        ENT_QUOTES,
        'UTF-8'
    );

    $password = $_POST['password'];

    if (
        strlen($password) < 8 ||
        !preg_match('/[A-Z]/', $password) ||
        !preg_match('/[a-z]/', $password) ||
        !preg_match('/[0-9]/', $password)
    ) {

        $messageClass = "error";
        $message = "Password must be at least 8 characters long and contain uppercase, lowercase, and numeric characters.";

    } else {

        $messageClass = "success";
        $message = "Registration Successful! Welcome, " . $username;

    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Secure Registration Form</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    font-family:Arial, sans-serif;
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background:linear-gradient(135deg,#4e73df,#1cc88a);
}

.container{
    width:450px;
    background:white;
    padding:30px;
    border-radius:15px;
    box-shadow:0 10px 25px rgba(0,0,0,.25);
}

h2{
    text-align:center;
    margin-bottom:25px;
}

label{
    display:block;
    margin-bottom:6px;
    font-weight:bold;
}

input[type=text],
input[type=password]{
    width:100%;
    padding:12px;
    border:1px solid #ccc;
    border-radius:8px;
    margin-bottom:15px;
}

button{
    width:100%;
    padding:12px;
    border:none;
    border-radius:8px;
    background:#4e73df;
    color:white;
    cursor:pointer;
    font-size:16px;
}

button:hover{
    background:#365edc;
}

.show-password{
    margin-bottom:15px;
}

.show-password label{
    display:inline;
    font-weight:normal;
}

.requirements{
    margin-top:15px;
    font-size:14px;
}

.requirements ul{
    margin-left:20px;
    margin-top:8px;
}

.success{
    margin-top:15px;
    padding:12px;
    border-radius:5px;
    background:#d4edda;
    color:#155724;
}

.error{
    margin-top:15px;
    padding:12px;
    border-radius:5px;
    background:#f8d7da;
    color:#721c24;
}

</style>
</head>
<body>

<div class="container">

<h2>User Registration</h2>

<form method="POST">

<label>Username</label>
<input type="text" name="username" required>

<label>Password</label>
<input type="password" id="password" name="password" required>

<div class="show-password">
    <input type="checkbox" id="showPassword" onclick="togglePassword()">
    <label for="showPassword">Show Password</label>
</div>

<button type="submit" name="register">Register</button>

</form>

<div class="requirements">
<b>Password Requirements:</b>
<ul>
<li>Minimum 8 characters</li>
<li>At least 1 uppercase letter</li>
<li>At least 1 lowercase letter</li>
<li>At least 1 number</li>
</ul>
</div>

<?php if (isset($_POST['register'])) { ?>
<div class="<?php echo $messageClass; ?>">
    <?php echo $message; ?>
</div>
<?php } ?>

</div>

<script>
function togglePassword() {
    var passwordField = document.getElementById("password");

    if (passwordField.type === "password") {
        passwordField.type = "text";
    } else {
        passwordField.type = "password";
    }
}
</script>

</body>
</html>
