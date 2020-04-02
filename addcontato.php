<?php
session_start();

    function make_thumb($src, $dest, $max_size) {
        /* read the source image */
        $source_image = imagecreatefromjpeg($src);
        $width = imagesx($source_image);
        $height = imagesy($source_image);

        /* create a new, "virtual" image */
        $virtual_image = imagecreatetruecolor($max_size, $max_size);

        /* copy source image at a resized size */
        imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $max_size, $max_size, $width, $height);

        /* create the physical thumbnail image to its destination */
        imagejpeg($virtual_image, $dest);
    }

    //connect to the database server
    $conn = mysqli_connect("localhost", "root", "demo123", "meuscontatosdemo") or die("Não consegui ligar à base de dados");
    $sql = "INSERT INTO contact (cname, cmorada, ctelefone, cemail, cfoto, id_user) VALUES ('".$_REQUEST['nome']."', '".$_REQUEST['morada']."', '".$_REQUEST['telefone']."', '".$_REQUEST['email']."', '".$_FILES['foto']['name']."', ".$_SESSION['session_user_id'].")";
    //echo $sql;

    if(mysqli_query($conn, $sql)) {
        // se a introdução do novo registo correu bem, então vamos fazer o upload do ficheiro
        if($_FILES['foto']['error'] > 0 ) { // erro ao carregar o ficheiro
            header("Location: novocontato.php?status=false");
        } else {
            make_thumb($_FILES['foto']['tmp_name'], "imagens/".$_FILES['foto']['name'], 80);
            //move_uploaded_file($_FILES['foto']['tmp_name'], "imagens/".$_FILES['foto']['name']);
        }
        header("Location: novocontato.php?status=true");
    } else {
        header("Location: novocontato.php?status=false");
    }

    mysqli_close($conn);
?>