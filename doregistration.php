<?php
    //connect to the database server
    $conn = mysqli_connect("localhost", "root", "demo123", "meuscontatosdemo") or die("Não consegui ligar à base de dados");
    $sql = "INSERT INTO utilizadores (username, password) VALUES ('".$_REQUEST['username']."', '".sha1($_REQUEST['password'])."')";
    //echo $sql;

    if(mysqli_query($conn, $sql)) {
        header("Location: login.php");
    } else {
        header("Location: registration.php?status=false");
    }
    mysqli_close($conn);
?>