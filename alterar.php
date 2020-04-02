<?php
session_start();
//connect to the database server
$conn = mysqli_connect("localhost", "root", "demo123", "meuscontatosdemo") or die("Não consegui ligar à base de dados");

$sql = "UPDATE contact SET cname = '".$_REQUEST['nome']."', cmorada = '".$_REQUEST['morada']."', ctelefone = '".$_REQUEST['telefone']."', cemail = '".$_REQUEST['email']."' WHERE id =".$_REQUEST['id']." AND id_user = ".$_SESSION['session_user_id'];

if(mysqli_query($conn, $sql)) {
    header("Location: contatos.php");
}
mysqli_close($conn);
?>
