<?php
    // Nama : Helga Nurul Bhaiti
    // NIM  : 24060122130062
    
    // VARIABEL*************************************************
    //assign nilai ke variabel
    $a = 15;
    echo 'Variabel a berisi : '.$a.'<br />';
    $a = 'Pemrograman Web dan Internet';
    echo 'Variabel a berisi : '.$a.'<br />';

    // VARIABEL LOKAL********************************************
    echo '<br />VARIABEL LOKAL<br />';
    // Define a function
    function diskon( ){
        $harga = 1000; //variabel hanya dpt diakses di dlm fungsi
        $harga = 0.2 * $harga; //jadi harga yang di set tdk mempengaruhi value harga diluar fungsi
        // -> harga 1000 tdk mempengaruhi harga 2000 di luar fungsi, begitu jg dgn perubahan harga yg dikali 0.2
    }
    $harga = 2000;
    diskon();
    echo 'harga = '.$harga.'<br />'; //ttp mencetak 2000 krn tdk dipengaruhi fungsi lokal dr diskon

    // VARIABEL GLOBAL*******************************************   
    echo '<br />VARIABEL GLOBAL<br />';
    function diskon1( ){
        // Define harga as a global variable
        global $harga; //artinya harga yg diluar fungsi dpt diakses di dalam fungsi
        // Multiple harga by 0.8
        $harga = 0.8 * $harga; //-> harga yg semula 2000 akan berubah menjadi 1600 karena dipengaruhi perhitungan tersebut
    }
    // Set harga
    $harga = 2000;
    // Call the function
    diskon1( );
    // Display the age
    echo 'harga = '.$harga.'<br />'; //mencetak harga setelah dipengaruhi fungsi diskon1

    // VARIABEL STATIK*******************************************
    echo '<br />VARIABEL STATIK<br />';
    // Define the function
    function diskon2( ){
        // Define harga as a static variable
        static $harga = 1000; //static artinya nilai variabel dipertahankan diantara pemanggilan fungsi, jadi variabel tersebut akan dapat berubah2 saat fungsi dipanggil terus-menerus
        $harga = 0.8 * $harga; //-> harga yg di set awal di dalam fungsi 1000 lalu akan berubah sesuai fungsi yang diberikan
        
        echo 'harga = '.$harga.'<br />'; // mencetak hasil harga di dalam fungsi
    }
    // Set harga to 2000
    $harga = 30; //artinya harga yang diluar fungsi tdk dapat dipakai di dalam fungsi, value aslinya tidak akan terpengaruh
    // Call the function twice
    diskon2();
    diskon2();
    // Display the harga
    echo 'harga = '.$harga.'<br />';

    // VARIABEL SUPER GLOBAL*******************************************
    echo '<br />VARIABEL SUPER GLOBAL<br />';
    echo htmlentities($_SERVER["PHP_SELF"]);

    //perbedaan lokal dan statik :
    //kalau lokal saat ia dipanggil terus, nilai akan terus diinisialisasi ulang, sehingga output yang dihasilkan tetap sama
    //sedangkan statik saat ia dipanggil terus, nilai variabel akan berubah sesuai perhitungan di dalam fungsi sehingga output akan berbeda tiap kali ia dipanggil 

    // ---PERTANYAAN---
    // 1. Berapakah nilai harga yang ditampilkan? Mengapa?

    // ---JAWABAN---
    //Harga yang ditampilkan adalah 2000, karena pada set harga 2000 tidak akan terpengaruh oleh fungsi lokal.
    //Sehingga nilai yang tercetak tidak akan berubah, begitu pula dengan harga 1000 di dalam fungsi lokal tidak akan terpengaruh dengan set variabel 2000.
    //Hal ini terjadi karena fungsi lokal hanya mempengaruhi variabel yang ada di dalam fungsi.

    // ---PERTANYAAN---
    // 2. Berapakah harga yang ditampilkan? Mengapa?

    // ---JAWABAN---
    //Harga yang ditampilkan adalah 1600 karena variabel yang telah di set dipengaruhi oleh fungsi global.
    //Sehingga variabel yang semula 2000 akan berubah menjadi 1600 setelah dikali dengan 0,8.
    //Hal ini terjadi karena fungsi global mempengaruhi variabel di luar fungsi.

    // ---PERTANYAAN---
    // 3. Berapakah harga yang ditampilkan? Mengapa?

    // ---JAWABAN---
    //Harga yang ditampilkan adalah 800, 640, 30 karena pada set harga 30, value atau nilai aslinya tidak akan terpengaruh oleh fungsi statik. 
    //Sehingga nilai yang tercetak oleh display harga tidak akan berubah, namun nilai di dalam fungsi statik tercetak karena terdapat display harga di dalam fungsi statik.
    //Hal ini terjadi karena fungsi statik hanya mempertahankan nilai variabel diantara pemanggilan fungsi, 
    //jadi variabel di dalam fungsi tersebut akan dapat berubah2 saat fungsi dipanggil terus-menerus,
    //Urutan pemanggilan mulai dari 800 hingga 30 karena dipanggil fungsi statik terlebih dahulu baru mencetak harga awal.
?>
