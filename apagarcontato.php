<?php
session_start();
//connect to the database server
$conn = mysqli_connect("localhost", "root", "demo123", "meuscontatosdemo") or die("Não consegui ligar à base de dados");

// primeiro vamos ter que ler o nome do ficheiro da imagem da BD
$sql1 = "SELECT cfoto FROM contact WHERE id=".$_REQUEST['id']." AND id_user = ".$_SESSION['session_user_id'];
$result = mysqli_query($conn, $sql1);
$row = mysqli_fetch_assoc($result);

unlink(realpath("./imagens/".$row['cfoto']));

$sql2 = "DELETE FROM contact WHERE id =".$_REQUEST['id']." AND id_user = ".$_SESSION['session_user_id'];
//echo $sql;

if(mysqli_query($conn, $sql2)) {
    header("Location: contatos.php");
}
mysqli_close($conn);
?>
