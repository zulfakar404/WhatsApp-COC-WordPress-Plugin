<?php
    $nama    = $_POST['nama'];
    $no_rek    = $_POST['no_rek'];
    $bank    = $_POST['bank'];
    
    if (!empty($_POST['proses'])){
        if (isset($_FILES['bukti_transfer'])) {
            $errors    = array();
            $file_name = $_FILES['bukti_transfer']['name'];
            $file_size = $_FILES['bukti_transfer']['size'];
            $file_tmp  = $_FILES['bukti_transfer']['tmp_name'];
            $file_type = $_FILES['bukti_transfer']['type'];
            $file_ext  = strtolower(end(explode('.', $_FILES['bukti_transfer']['name'])));
            
            $bukti_upload = $no_rek."_".date('d-m-Y_H-i-s').'.'.pathinfo($file_name, PATHINFO_EXTENSION);
            
            $extensions = array("jpeg", "jpg", "png");
            
            if (in_array($file_ext, $extensions) === false) {
                $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
            }
            
            if ($file_size > 2097152) {
                $errors[] = 'File size must be excately 2 MB';
            }
            
            if (empty($errors) == true) {
                move_uploaded_file($file_tmp, '../bukti_tf/'.$bukti_upload);
                header("Location: https://api.whatsapp.com/send?phone=". $nomor_tujuan ."&text=Hallo%20saya%20" . $nama . "%2C%20saya%20sudah%20melakukan%20transfer.%20Berikut datanya%0ANama: " .$name. "%0ABank: " .$bank."%0ANo. Rekening: " .$no_rek. "%0ABukti Transfer: ".$_SERVER['HTTP_HOST']."/plugins/wp-content/wa-coc-pe-jung/bukti_tf/" .$bukti_upload);
            }
            else {
                print_r($errors);
            }
        }
    }
    else {
        echo "Mau ngapain njing?";
    }

?>