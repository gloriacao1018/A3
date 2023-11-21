<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$fName = $_POST['fName'];
$lName = $_POST['lName'];
$email = $_POST['email'];
$phone_num = $_POST['phone_num'];
$message = $_POST['message'];

$dsn = 'mysql:host=localhost;dbname=IMMNEWSNETWORK;charset=utf8mb4';
$dbusername = 'root';
$dbpassword = '';


$pdo = new PDO($dsn, $dbusername, $dbpassword);


$stmt = $pdo->prepare("INSERT INTO `contactform` (`fName`, `lName`, `email`, `phone_num`, `message`, `created_at`) VALUES (?, ?, ?, ?, ?, current_timestamp())");

$stmt->execute([$fName, $lName, $email, $phone_num, $message]);


if($stmt->execute()){ 
?>
<h1> Thank you for your message!</h1>
<a href="member-page.php">Back to Article Page</a>
<?php

}else{  
?><h1>Error</h1> <?php
}
?>


