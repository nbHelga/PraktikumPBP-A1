<!DOCTYPE html>
<html lang="en">
<head>
    <title>Form Mahasiswa 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
<?php
//Inisialisasi pesan error
$error_nama = null;
$error_email = null;
$error_alamat = null;
$error_jenis_kelamin = null;
$error_kota = null;
$error_minat = null;

if (isset($_POST['submit'])){
    //validasi nama: tidak boleh kosong, hanya dapat berisi huruf dan spasi
    $nama = test_input($_POST['nama']);
    if(empty($nama)){
        $error_nama = "Nama harus diisi";
    } elseif (!preg_match("/^[a-zA-Z ]*$/",$nama)){
        $error_nama = "Nama hanya dapat berisi huruf dan spasi";
    }
    //validasi email: tidak boleh kosong, format harus benar
    $email = test_input($_POST['email']);
    if ($email == ''){
        $error_email = "Email harus diisi";
    }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error_email = "Format email tidak benar";
    }
    //validasi alamat: tidak boleh kosong, format harus benar
    $alamat = test_input($_POST['alamat']);
    if ($alamat == ''){
        $error_alamat = "Alamat harus diisi";
    }
    //validasi jenis kelamin: tidak boleh kosong, format harus benar
    if (isset($_POST['jenis_kelamin'])){
        $jenis_kelamin = $_POST['jenis_kelamin'];
    } else {
        $error_jenis_kelamin = "Jenis kelamin harus diisi";
    }
    //validasi kota: tidak boleh kosong, format harus benar
    $kota = $_POST['kota'];
    if ($kota == '-' || $kota == 'kota' || empty($kota)){
        $error_kota = "Kota harus diisi";
    }
    //validasi minat: tidak boleh kosong, format harus benar
    // $minat = $_POST['minat']; //pakai ini tidak bisa tidak tau kenapa selalu error
    if (empty($_POST['minat'])){
        $error_minat = "Peminatan harus dipilih";
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
        <label for="nama">Nama:</label><br />
            <input type="text" class="form-control" id="nama" name="nama" maxlength="50" value = "<?php if (isset($nama)) {echo $nama;} ?>">
            <div class = "error text-danger"><?php if (isset($error_nama)) echo $error_nama; ?></div>
        </div>
        <div class="form-group m-2">
            <label for="email" class="label">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value = "<?php if (isset($email)) {echo $email;} ?>">
            <div class = "error text-danger"><?php if (isset($error_email)) echo $error_email; ?></div>
        </div>
        <div class="form-group m-2">
            <label for="alamat">Alamat:</label><br />
            <textarea class="form-control" id="alamat" rows = "3" name = "alamat">
            <?php if (isset($alamat)) {echo $alamat;} ?></textarea>
            <div class = "error text-danger"><?php if (isset($error_alamat)) echo $error_alamat; ?></div>
        </div>
        <div class="form-group m-2">
            <label class="label" for="kota">Kota/Kabupaten:</label><br />
            <select name="kota" id="kota" class="form-control">
                <option value="-" selected disable>-- Pilih Kota Kabupaten --</option>
                <option value="Semarang" <?php if (isset($kota) && $kota == "Semarang") echo 'selected  = "true"'; ?>>Semarang</option>
                <option value="Jakarta" <?php if (isset($kota) && $kota == "Jakarta") echo 'selected  = "true"'; ?>>Jakarta</option>
                <option value="Bandung" <?php if (isset($kota) && $kota == "Bandung") echo 'selected  = "true"'; ?>>Bandung</option>
                <option value="Surabaya" <?php if (isset($kota) && $kota == "Surabaya") echo 'selected  = "true"'; ?>>Surabaya</option>
            </select>
            <div class = "error text-danger"><?php if (isset($error_kota)) echo $error_kota; ?></div>
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
        <label class="check m-2">Peminatan:</label><br />
        <div class="form-check m-2">
            <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="minat[]" value="coding" <?php if (isset($minat) && in_array('coding', $minat)) echo 'checked'; ?>>Coding
            </label>
            
        </div>
        <div class="form-check m-2">
            <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="minat[]" value="ux_design" <?php if (isset($minat) && in_array('ux_design', $minat)) echo 'checked'; ?>>UX Design
            </label>
            
        </div>
        <div class="form-check m-2">
            <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="minat[]" value="data_science" <?php if (isset($minat) && in_array('data_science', $minat)) echo 'checked'; ?>>Data Science
            </label>
            <div class = "error text-danger"><?php if (isset($error_minat)) echo $error_minat; ?></div>
        </div>
        <!-- submit, reset dan button -->
         <div class="m-2 text-center">
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        <button type="reset" class="btn btn-danger">Reset</button>
        </div>
    

</body>
</html>