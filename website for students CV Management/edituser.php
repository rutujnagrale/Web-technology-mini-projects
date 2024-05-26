<?php
session_start();
$nameErr = $emailErr = $genderErr = $addressErr = $icErr = $contactErr = $usernameErr = $passwordErr = "";
$name = $email = $gender = $address = $ic = $contact = $uname = $upassword = "";
$cID;
$oUserName;
$oPassword;
$oName;
$oIC;
$oEmail;
$oPhone;
$oAddress;
$servername = "localhost";
$username = "root";
$password = "shruti";
$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "USE book_store";
$conn->query($sql);
$sql = "SELECT users.username, users.password, customer.customer_name, customer.customer_ic, customer.customer_email, 
customer.customer_phone, customer.customer_gender, customer.customer_address
FROM users, customer
WHERE users.user_id = customer.user_id AND users.user_id = " . $_SESSION['id'] . "";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
$oUserName = $row['username'];
$oPassword = $row['password'];
$oName = $row['customer_name'];
$oIC = $row['customer_ic'];
$oEmail = $row['customer_email'];
$oPhone = $row['customer_phone'];
$oAddress = $row['customer_address'];
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
if (empty($_POST["name"])) {
$nameErr = "Please enter your name";
} else {
if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
$nameErr = "Only letters and white space allowed";
$name = "";
} else {
$name = $_POST['name'];
if (empty($_POST["uname"])) {
$usernameErr = "Please enter your Username";
$uname = "";
} else {
$uname = $_POST['uname'];
if (empty($_POST["upassword"])) {
$passwordErr = "Please enter your Password";
$upassword = "";
} else {
$upassword = $_POST['upassword'];
if (empty($_POST["ic"])) {
$icErr = "Please enter your IC number";
} else {
if (!preg_match("/^[0-9 -]*$/", $ic)) {
$icErr = "Please enter a valid IC number";
$ic = "";
} else {
$ic = $_POST['ic'];
if (empty($_POST["email"])) {
$emailErr = "Please enter your email address";
} else {
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
$emailErr = "Invalid email format";
$email = "";
} else {
$email = $_POST['email'];
if (empty($_POST["contact"])) {
$contactErr = "Please enter your phone number";
} else {
if (!preg_match("/^[0-9 -]*$/", $contact)) {
$contactErr = "Please enter a valid phone number";
$contact = "";
} else {
$contact = $_POST['contact'];
if (empty($_POST["gender"])) {
$genderErr = "* Gender is required!";
$gender = "";
} else {
$gender = $_POST['gender'];
if (empty($_POST["address"])) {
$addressErr = "Please enter your address";
$address = "";
} else {
$address = $_POST['address'];
$servername = "localhost";
$username = "root";
$password = "shruti";
$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "USE book_store";
$conn->query($sql);
$sql = "UPDATE users SET username = '" . $uname . "', password = '" . $upassword 
. "' WHERE user_id = "
. $_SESSION['id'] . "";
$conn->query($sql);
$sql = "UPDATE customer SET customer_name = '" . $name . "', customer_phone = '"
. $contact . "', 
customer_ic = '" . $ic . "', customer_email = '" . $email . "', customer_address 
= '" . $address . "', 
customer_gender = '" . $gender . "'";
$conn->query($sql);
header("Location:index.php");
}
}
}
}
}
}
}
}
}
}
}
}
}
function test_input($data)
{
$data = trim($data);
$data = stripcslashes($data);
$data = htmlspecialchars($data);
return $data;
}
?>
<html>
<link rel="stylesheet" href="style.css">
<body>
<header>
<blockquote>
<a href="index.php"><img src="image/logo.png"></a>
</blockquote>
</header>
<blockquote>
<div class="container">
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
<h1>Edit Profile:</h1>
Full Name:<br><input type="text" name="name" placeholder="<?php echo $oName; ?>">
<span class="error" style="color: red; font-size: 0.8em;"><?php echo $nameErr; ?></span><br><br>
User Name:<br><input type="text" name="uname" placeholder="<?php echo $oUserName; ?>">
<span class="error" style="color: red; font-size: 0.8em;"><?php echo $usernameErr; ?></span><br><br>
New Password:<br><input type="password" name="upassword" placeholder="<?php echo $oPassword; ?>">
<span class="error" style="color: red; font-size: 0.8em;"><?php echo $passwordErr; ?></span><br><br>
IC Number:<br><input type="text" name="ic" placeholder="<?php echo $oIC; ?>">
<span class="error" style="color: red; font-size: 0.8em;"><?php echo $icErr; ?></span><br><br>
E-mail:<br><input type="text" name="email" placeholder="<?php echo $oEmail; ?>">
<span class="error" style="color: red; font-size: 0.8em;"><?php echo $emailErr; ?></span><br><br>
Mobile Number:<br><input type="text" name="contact" placeholder="<?php echo $oPhone; ?>">
<span class="error" style="color: red; font-size: 0.8em;"><?php echo $contactErr; ?></span><br><br>
<label>Gender:</label><br>
<input type="radio" name="gender" <?php if (isset($gender) && $gender == "Male") echo "checked"; ?>
value="Male">Male
<input type="radio" name="gender" <?php if (isset($gender) && $gender == "Female") echo "checked"; ?>
value="Female">Female
<span class="error" style="color: red; font-size: 0.8em;"><?php echo $genderErr; ?></span><br><br>
<label>Address:</label><br>
<textarea name="address" cols="50" rows="5" placeholder="<?php echo $oAddress; ?>"></textarea>
<span class="error" style="color: red; font-size: 0.8em;"><?php echo $addressErr; ?></span><br><br>
<input class="button" type="submit" name="submitButton" value="Edit">
<input class="button" type="button" name="cancel" value="Cancel" onClick="window.location='index.php';" />
</form>
</div>
</blockquote>
</centre>
</body>
</html>
