<?php
    $nama    = $_POST['nama'];
    $pesan   = $_POST['pesan'];
    
    if (!empty($_POST['proses']))
    {
        header("Location: https://api.whatsapp.com/send?phone=".$nomor_tujuan."&text=Hallo%20saya%20".$nama."%2C%20".$pesan);
    }
    else
    {
        echo "Hayoo loh, mau ngapain lu njiing!1!1";
    }
?>