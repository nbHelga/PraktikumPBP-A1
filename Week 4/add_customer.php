<?php 
// Nama         : Helga Nurul Bhaiti
// NIM          : 24060122130062
// Tanggal      : 24/09/2024
// File         : add_customer.php
// Deskripsi    : Untuk menambahkan customer baru ke daftar customer

// TODO 2: Lakukan koneksi dengan database
require_once('lib/db_login.php');

// Variable untuk menyimpan data input pengguna
$name = $address = $city = "";
$error_name = $error_address = $error_city = "";
$valid = true;

if (isset($_POST['submit'])) {
// TODO 3: Handle form submission
    // Validasi terhadap field name
    $name = test_input($_POST['name']);
    if ($name == '') {
        $error_name = "Name is required";
        $valid = FALSE;
    } else if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        $error_name = "Only letters and white space allowed";
        $valid = FALSE;
    }

    // Validasi terhadap field address
    $address = test_input($_POST['address']);
    if ($address == '') {
        $error_address = "Address is required";
        $valid = FALSE;
    }
    
    // Validasi terhadap field city
    $city = test_input($_POST['city']);
    if ($city == '' || $city == 'none') {
        $error_city = "City is required";
        $valid = FALSE;
    }

    
    // Update data into database
    if ($valid) {
        //escape input data
        // $address = $db->real_escape_string($address);
        //Asign a query
        $query = "INSERT INTO customers (name, address, city) VALUES ('$name', '$address', '$city')";
        
        //Execute the query
        $result = $db->query($query);
        if(!$result){
            die ("Could not query the database : <be />".$db->error. '<br>Query:' .$query);
        } else{
            header('Location: view_customer.php');
            exit();
        }
    }
}
?>

<?php include('./header.php') ?>
<br>
<div class="card mt-4">
    <div class="card-header">ADD Customers Data</div>
    <div class="card-body">
        // TODO 1: Tambahkan nilai atribut action and method pada form
        <form action="" method="" autocomplete="on"> 
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>">
                <div class="error"><?php if (isset($error_name)) echo $error_name ?></div>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <textarea class="form-control" name="address" id="address" rows="5"><?php echo $address; ?></textarea>
                <div class="error"><?php if (isset($error_address)) echo $error_address ?></div>
            </div>
            <div class="form-group">
                <label for="city">City:</label>
                <select name="city" id="city" class="form-control" required>
                    <option value="none" <?php if (!isset($city)) echo 'selected' ?>>--Select a city--</option>
                    <option value="Airport West" <?php if (isset($city) && $city == "Airport West") echo 'selected' ?>>Airport West</option>
                    <option value="Box Hill" <?php if (isset($city) && $city == "Box Hill") echo 'selected' ?>>Box Hill</option>
                    <option value="Yarraville" <?php if (isset($city) && $city == "Yarraville") echo 'selected' ?>>Yarraville</option>
                </select>
                <div class="error"><?php if (isset($error_city)) echo $error_city ?></div>
            </div>
            <br>
            <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
            <a href="view_customer.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
<?php include('./footer.php') ?>
<?php
$db->close();
?>

