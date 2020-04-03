<?php
session_start();
$options = [
    'salt' => 'iuwqyiruewyiteyweitywietyiuweyt',
    'cost' => 10
];
//connect to the database server
$conn = mysqli_connect("localhost", "root", "demo123", "meuscontatosdemo") or die("Não consegui ligar à base de dados");
$sql = "SELECT * FROM utilizadores WHERE username='".$_REQUEST['username']."' AND password='".password_hash($_REQUEST['password'], PASSWORD_BCRYPT, $options)."'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['isLoggedIn'] = true;
    $_SESSION['session_user_id'] = $row['id'];
    $_SESSION['session_username'] = $row['username'];
    header("Location: index.php");
} else {
    header("Location: login.php?status=false");
}
mysqli_close($conn);
?>