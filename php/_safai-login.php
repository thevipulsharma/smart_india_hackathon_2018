<?php //PAGE-24
//echo(mysqli_error($conn));

require_once("../app-includes/app-include.php");
$username = $_POST['username'];
$password = $_POST['password'];

if(!isset($username)) die('Error 24_101');

$username = query_protect($conn, $username);
$password = query_protect($conn, $password);

$query = "select * from safai_admin where user_name = '$username' and password = '$password'";
$result = mysqli_query($conn, $query);

query_check($result, 'Error 24_102');
if(mysqli_num_rows($result)!=1) die('Error 24_103 : Invalid username or password!');

$row = mysqli_fetch_assoc($result);
$adminId = $row['admin_id'];

session_start();
$_SESSION['safai']=1;
$_SESSION['adminId'] = $adminId;

die(header('Location:../admin/safai-window.php'));
?>