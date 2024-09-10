<?php
    // Nama : Helga Nurul Bhaiti
    // NIM  : 24060122130062
    
    // FOR-LOOP********************************************
    echo '<br />FOR-LOOP<br />';
    $harga = 1000;
    echo '<table border="1">';
    echo '<tr>
            <td>No</td>
            <td>Diskon</td>
            <td>Harga Setelah Diskon</td>
        </tr>';
        
    // for ($i=1;$i<=10;$i++){
    //     echo '<tr>';
    //     echo '<td>'.$i.'</td>'; //isi nomor
    //     $diskon = $i * 0.1;
    //     echo '<td>'.($diskon*100).' % </td>'; //isi diskon
    //     $harga_diskon = $harga - ($harga * $diskon);
    //     echo '<td>'.$harga_diskon.'</td>'; //isi harga setelah diskon
    //     echo '</tr>';
    // }
    // echo '</table>';

    // WHILE********************************************
    echo '<br />WHILE<br />';
    // TODO WHILE
    $i=1;
    while($i<=10)
    {
        echo '<tr>';
        echo '<td>'.$i.'</td>'; //isi nomor
        $diskon = $i * 0.1;
        echo '<td>'.($diskon*100).' % </td>'; //isi diskon
        $harga_diskon = $harga - ($harga * $diskon);
        echo '<td>'.$harga_diskon.'</td>'; //isi harga setelah diskon
        echo '</tr>';
        $i++;
    }
    echo '</table>';

    // WHILE-DO********************************************
    echo '<br />WHILE-DO<br />';
    // TODO DO-WHILE
    $i=1;
    do{
        echo '<tr>';
        echo '<td>'.$i.'</td>'; //isi nomor
        $diskon = $i * 0.1;
        echo '<td>'.($diskon*100).' % </td>'; //isi diskon
        $harga_diskon = $harga - ($harga * $diskon);
        echo '<td>'.$harga_diskon.'</td>'; //isi harga setelah diskon
        echo '</tr>';
        $i++;
    } while ($i<=10);
    echo '</table>';


?>