<?php
    // Nama : Helga Nurul Bhaiti
    // NIM  : 24060122130062
    
    // NUMERIC ARRAY********************************************
    echo '<br />NUMERIC ARRAY<br />';
    //assignment melalui array identifier
    for ($i=0;$i<10;$i++){
        $diskon[] = $i * 5;
    }

    //assignment menggunakan fungsi array
    // $diskon = array(0,5,10,20,30,40,50,60,70,80,90);
    
    //cek apakah sebuah variabel bertipe array
    if (is_array($diskon)){
        echo 'Array <br/>';
    } else{
        echo 'Not Array <br/';
    }

    //menampilkan isi array
    $n = sizeof($diskon);
    for($i=0;$i<=($n-1);$i++){
        echo 'Diskon hari ke-'.($i+1).' = '.$diskon[$i].' % <br />';
    }

    // Percobaan 1 ============================================= 
    $disc = array(60,20,50,90,0,70,10,30,80,40);

    // TODO urutkan array disc tersebut dengan menggunakan ksort()
    echo '<br />KSORT<br />';
    ksort($disc); //mengurutkan berdasarkan kunci, sehingga array urut seperti aslinya.
    print_r($disc);
    echo '<br />';

    // TODO urutkan array disc tersebut dengan menggunakan asort()
    echo '<br />ASORT<br />';
    asort($disc); //mengurutkan nilai array dan mempertahankan kunci, sehingga nilai array akan terurut berdasarkan nilai namun urutan dalam array (kunci) sesuai nomor asal. 
    print_r($disc);
    echo '<br />';

    // TODO urutkan array disc tersebut dengan menggunakan sort()
    echo '<br />SORT<br />';
    sort($disc); //mengurutkan nilai array dan menghapus kunci, sehingga nilai array akan terurut dengan nomor array (key) tetap seperti asal atau nilai akan berhubungan dengan kunci baru dan kunci lama dihapus.
    print_r($disc);
    echo '<br />';

    // ASSOSIATIVE ARRAY********************************************
    echo '<br />ASSOSIATIVE ARRAY<br />';
    //assignment menggunakan fungsi array
    $bulan = array('jan' => 'Januari', 
        'feb' => 'Februari',
        'mar' => 'Maret',
        'apr' => 'April',
        'mei' => 'Mei',
        'jun' => 'Juni',
        'jul' => 'Juli',
        'agu' => 'Agustus',
        'sep' => 'Sepetember',
        'okt' => 'Oktober',
        'nov' => 'November',
        'des' => 'Desember');
    foreach($bulan as $kode_bulan => $nama_bulan){
        echo 'Kode bulan "'.$kode_bulan.'" => "'.$nama_bulan.'"<br />';
    }

    // Percobaan 2 =============================================     
    // TODO urutkan array bulan tersebut dengan menggunakan ksort()
    echo '<br />KSORT2<br />';
    ksort($bulan); //mengurutkan berdasarkan kunci, sehingga bulan urut seperti aslinya.
    print_r($bulan);
    echo '<br />';

    // TODO urutkan array bulan tersebut dengan menggunakan asort()
    echo '<br />ASORT2<br />';
    asort($bulan); //mengurutkan nilai bulan dan mempertahankan kunci, sehingga urutan bulan akan terurut berdasarkan urutan bulan biasa namun kode bulan (kunci) sesuai kode bulan sebelumnya. 
    print_r($bulan);
    echo '<br />';

    // TODO urutkan array bulan tersebut dengan menggunakan sort()
    echo '<br />SORT2<br />';
    sort($bulan); //mengurutkan nilai bulan dan menghapus kunci, sehingga nilai bulan akan terurut dengan kode bulan (key) tetap seperti asal atau nilai bulan akan berhubungan dengan kode bulan baru dan kode bulan lama dihapus.
    print_r($bulan);

?>