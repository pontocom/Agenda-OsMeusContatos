<?php
$options = [
    'salt' => 'iuwqyiruewyiteyweitywietyiuweyt',
    'cost' => 10
];

    //connect to the database server
    $conn = mysqli_connect("localhost", "root", "demo123", "meuscontatosdemo") or die("Não consegui ligar à base de dados");
    $sql = "INSERT INTO utilizadores (username, password) VALUES ('".$_REQUEST['username']."', '".password_hash($_REQUEST['password'], PASSWORD_BCRYPT, $options)."')";
    //echo $sql;

    if(mysqli_query($conn, $sql)) {
        header("Location: login.php");
    } else {
        header("Location: registration.php?status=false");
    }
    mysqli_close($conn);
?>