<?php
    // Nama : Helga Nurul Bhaiti
    // NIM  : 24060122130062
    
    // SINGLE IF ELSE********************************************
    echo '<br />SINGLE IF-ELSE<br />';
    $lulus = TRUE;
    if ($lulus){
        echo 'Selamat Anda Lulus. <br/>';
    }else{
        echo 'Maaf, Anda gagal. Silakan mencoba lagi. <br />';
    }

    // MULTIPLE IF ELSE********************************************
    echo '<br />MULTIPLE IF-ELSE<br />';
    // TODO Coba dengan beberapa nilai yang lain, misalkan 86, 68, 59, 30, 11, 0, 110, -98, 'abc'
    $nilai = 60;
    // $nilai = 86; //Nilai : A
    // $nilai = 68; //Nilai : B
    // $nilai = 59; //Nilai : C
    // $nilai = 30; //Nilai : D
    // $nilai = 11; //Nilai : E
    // $nilai = 0; //Nilai : E
    // $nilai = 110; //Invalid Nilai
    // $nilai = -98; //Invalid Nilai
    // $nilai = 'abc'; //Invalid Nilai
    if ($nilai >= 80 && $nilai <= 100){
        echo 'Nilai : A <br />';
    }elseif ($nilai >= 60 && $nilai < 80){
        echo 'Nilai : B <br />';
    }elseif ($nilai >= 40 && $nilai < 60){
        echo 'Nilai : C <br />';
    }elseif ($nilai >= 20 && $nilai < 40){
        echo 'Nilai : D <br />';
    }elseif ($nilai >= 0 && $nilai < 20){
        echo 'Nilai : E <br />';
    }else{
        echo 'Invalid nilai <br />';
    }

    

    // SWITCH********************************************
    echo '<br />SWITCH<br />';
    // TODO Coba dengan bebrapa nilai lain, misalkan B, C, D, E, AB
    // $nilai = 'A';
    // $nilai = 'B'; //Baik
    $nilai = 'C'; //Cukup
    // $nilai = 'D'; //Kurang
    // $nilai = 'E'; //Tidak Lulus
    // $nilai = 'AB'; //Invalid nilai!
    switch ($nilai) {
        case "A":
            echo "Sangat Baik. <br />";
            break;
        case "B":
            echo "Baik. <br />";
            break;
        case "C":
            echo "Cukup. <br />";
            break;
        case "D":
            echo "Kurang. <br />";
            break;
        case "E":
            echo "Tidak Lulus. <br />";
            break;
        default:
            echo "Invalid nilai! <br />";
            break;
    }

    echo '<br />SWITCH TANPA BREAK<br />';
    // TODO SWITCH TANPA BREAK
    $nilai = 'A';
    // $nilai = 'C';
    // $nilai = 'E';
    switch ($nilai) {
        case "A":
            echo "Sangat Baik. <br />";
            // break;
        case "B":
            echo "Baik. <br />";
            // break;
        case "C":
            echo "Cukup. <br />";
            // break;
        case "D":
            echo "Kurang. <br />";
            // break;
        case "E":
            echo "Tidak Lulus. <br />";
            // break;
        default:
            echo "Invalid nilai! <br />";
            // break;
    }
    
?>
