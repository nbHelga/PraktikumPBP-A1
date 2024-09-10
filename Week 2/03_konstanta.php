<?php
    // Nama : Helga Nurul Bhaiti
    // NIM  : 24060122130062
    
    define("PWI", "Permograman Web dan Internet "); //define pwi sebagai nama konstanta, sedangkan permograman web dan internet sebagai value dari konstanta
    echo 'Hari ini sedang praktikum '.PWI.'<br />'; //jadi ketika memanggil konstanta pwi, php akan mencetak nilai yg didefinisikan sblmnya yaitu permograman web dan internet
    $constant_name = "PWI";
    echo 'Hari ini sedang praktikum '.constant($constant_name).'<br />'; //fungsi constant() utk mengakses nilai dari konstanta pwi

    //konstanta bawaan PHP
    echo 'File yang sedang diproses "'. __FILE__ .' pada baris "'. //file yang dimaksud adalah letak file di folder apa (path)
    __LINE__ .'"<br />'; //line yang dimaksud adalah pada baris ke berapa letak code ini
?>