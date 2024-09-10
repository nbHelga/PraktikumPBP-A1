<?php
    // Nama : Helga Nurul Bhaiti
    // NIM  : 24060122130062

    function hitung_rata($nilai) {
        // TODO hitung rata-rata nilai mahasiswa
        $rata2 = ($nilai[0]+ $nilai[1] + $nilai[2]) / 3;
        return $rata2;
        
    }

    function print_mhs($array_mhs) {
        // TODO tampilkan tabel
        echo '<table border="1">';
        echo '<tr>
                <td>Nama</td>
                <td>Nilai 1</td>
                <td>Nilai 2</td>
                <td>Nilai 3</td>
                <td>Rata2</td>
            </tr>';
        foreach($array_mhs as $nama => $nilai){
            // for ($i=0;$i<2;$i++){
                echo '<tr>';
                echo '<td>'.$nama.'</td>';
                echo '<td>'.$nilai[0].'</td>';
                echo '<td>'.$nilai[1].'</td>';
                echo '<td>'.$nilai[2].'</td>';
                $rata2 = hitung_rata($nilai);
                echo '<td>'.$rata2.'</td>';
                // $rata2 = hitung_rata($array_mhs);
                // echo '<td>'.$rata2.'</td>';
                echo '</tr>';
            // }
        }
        
        echo '</table>';
    }

    // Array data mahasiswa
    $array_mhs = [
        'Abdul' => [89, 90, 54],
        'Budi' => [98, 65, 74],
        'Nina' => [67, 56, 84],
    ];

    // Menampilkan data mahasiswa dalam bentuk tabel
    print_mhs($array_mhs);
?>
