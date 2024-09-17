<!DOCTYPE html>
<html lang="en">
<head>
    <title>Form Input Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        function pilihekskul() {
            var kelas = document.getElementById("kelas").value;
            var ekskul = document.getElementById("ekskul");
            if (kelas === "X" || kelas === "XI") {
                ekskul.style.display = "block";
            } else {
                ekskul.style.display = "none";
                var checkboxes = document.querySelectorAll('input[name="ekskul[]"]');
                checkboxes.forEach(function(checkbox) {
                    checkbox.checked = false;
                });
            }
        }
        window.onload = function() {
            pilihekskul();
        };
    </script>
</head>
<body>
<?php
    //Inisialisasi pesan error
    $error_nis = null;
    $error_nama = null;
    $error_jenis_kelamin = null;
    $error_kelas = null;
    $error_ekskul = null;
    $ekskul = [];

    if (isset($_POST['submit'])){
        //validasi nis: tidak boleh kosong, hanya dapat berisi angka 0..9 dan berjumlah 10
        $nis = test_input($_POST['nis']);
        if(empty($nis)){
            $error_nis = "NIS harus diisi";
        } elseif (!preg_match("/^[0-9]{10}$/",$nis)){
            $error_nis = "NIS hanya dapat berisi angka 0..9 dan berjumlah 10";
        }
        //validasi nama: tidak boleh kosong, hanya dapat berisi huruf dan spasi
        $nama = test_input($_POST['nama']);
        if (empty($nama)){
            $error_nama = "Nama harus diisi";
        }elseif (!preg_match("/^[a-zA-Z ]*$/",$nama)){
            $error_nama = "Nama hanya dapat berisi huruf dan spasi";
        }
        //validasi jenis kelamin: tidak boleh kosong, format harus benar
        if (isset($_POST['jenis_kelamin'])){
            $jenis_kelamin = $_POST['jenis_kelamin'];
        } else {
            $error_jenis_kelamin = "Jenis kelamin harus diisi";
        }
        //validasi kelas: tidak boleh kosong
        $kelas = $_POST['kelas'];
        if ($kelas == '-' || empty($kelas)){
            $error_kelas = "Kelas harus dipilih";
        }
        //validasi ektrakulikuler: hanya bisa muncul kalau kelas pilih X atau XI
        $ekskul = $_POST['ekskul'];
        if ($kelas != "XII") {
            if (empty($ekskul)) {
                $error_ekskul = "Pilih minimal 1 ekstrakurikuler";
            } elseif (count($ekskul) > 3) {
                $error_ekskul = "Pilih maksimal 3 ekstrakurikuler";
            }
        }
    }
    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>
    <div class="container mt-5 border rounded p-0">
    <div class="bg-secondary rounded-top p-2 text-white text-center">Form Mahasiswa</div>
    <form method = "POST" autocomplete = "on" action = "">
        <div class = "form-group m-2">
        <label for="nis">NIS:</label><br />
            <input type="text" class="form-control" id="nis" name="nis" maxlength="50" value = "<?php if (isset($nis)) {echo $nis;} ?>">
            <div class = "error text-danger"><?php if (isset($error_nis)) echo $error_nis; ?></div>
        </div>
        <div class="form-group m-2">
            <label for="nama" class="label">Nama:</label>
            <input type="nama" class="form-control" id="nama" name="nama" value = "<?php if (isset($error_nama)) {echo $error_nama;} ?>">
            <div class = "error text-danger"><?php if (isset($error_nama)) echo $error_nama; ?></div>
        </div>
        <label class="check m-2">Jenis kelamin:</label><br />
        <div class="form-check m-2">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="jenis_kelamin" value="pria" <?php if (isset($jenis_kelamin) && $jenis_kelamin == "pria") echo "checked"; ?>>Pria
            </label>
        </div>
        <div class="form-check m-2">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="jenis_kelamin" value="wanita" <?php if (isset($jenis_kelamin) && $jenis_kelamin == "wanita") echo "checked"; ?>>Wanita
            </label>
            <div class = "error text-danger"><?php if (isset($error_jenis_kelamin)) echo $error_jenis_kelamin; ?></div>
        </div>
        <br>
        <div class="form-group m-2">
            <label class="label" for="kelas">Kelas:</label><br />
            <select name="kelas" id="kelas" class="form-control" onchange="pilihekskul()">
                <option value="-" selected disable>-- Pilih Kelas --</option>
                <option value="X" <?php if (isset($kelas) && $kelas == "X") echo 'selected  = "true"'; ?>>X</option>
                <option value="XI" <?php if (isset($kelas) && $kelas == "XI") echo 'selected  = "true"'; ?>>XI</option>
                <option value="XII" <?php if (isset($kelas) && $kelas == "XII") echo 'selected  = "true"'; ?>>XII</option>
            </select>
            <div class = "error text-danger"><?php if (isset($error_kelas)) echo $error_kelas; ?></div>
        </div>
        <div id="ekskul" style="display: none;">
        <label class="check m-2">Ekstrakulikuler:</label><br />
        <div class="form-check m-2">
            <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="ekskul[]" value="Pramuka" <?php if (isset($ekskul) && in_array('Pramuka', $ekskul)) echo 'checked'; ?>>Pramuka
            </label>
            
        </div>
        <div class="form-check m-2">
            <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="ekskul[]" value="Seni Tari" <?php if (isset($ekskul) && in_array('Seni Tari', $ekskul)) echo 'checked'; ?>>Seni Tari
            </label>
            
        </div>
        <div class="form-check m-2">
            <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="ekskul[]" value="Sinematografi" <?php if (isset($ekskul) && in_array('Sinematografi', $ekskul)) echo 'checked'; ?>>Sinematografi
            </label>
            
        </div>
        <div class="form-check m-2">
            <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="ekskul[]" value="Basket" <?php if (isset($ekskul) && in_array('Basket', $ekskul)) echo 'checked'; ?>>Basket
            </label>
            <div class = "error text-danger"><?php if (isset($error_ekskul)) echo $error_ekskul; ?></div>
        </div>
        </div>
        <!-- submit, reset dan button -->
         <div class="m-2 text-center">
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        <button type="reset" class="btn btn-danger">Reset</button>
        </div>
    
        <div class="container">
        <?php
            if (isset($_POST["submit"])) {
                echo "<h3 style='margin-top:0px;'>Your Input:</h3>";
                echo 'NIS = '.$_POST['nis'].'</br>';
                echo 'Nama = '.$_POST['nama'].'</br>';
                
                if (isset($_POST['jenis_kelamin'])) {
                    echo 'Jenis Kelamin = '.$_POST['jenis_kelamin'].'</br>';
                }else{
                    echo '<span class="teks-merah">Jenis kelamin belum diatur !</br></span>';
                }

                echo 'Kelas = '.$_POST['kelas'].'</br>';

                if ($kelas != "XII") {
                    echo "Ekstrakurikuler: " . implode(", ", $ekskul) . "<br>";
                }
            }
        ?>
    </div>
</body>
</html>