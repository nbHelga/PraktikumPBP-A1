<?php
// Nama         : Helga Nurul Bhaiti
// NIM          : 24060122130062
// Tanggal      : 24/09/2024
// File         : delete_customer.php
// Deskripsi    : Untuk menghapus customer

// TODO 1: Lakukan koneksi dengan database
require_once('lib/db_login.php');
session_start();
  
if (isset($_GET['id'])) {
    $customerid = test_input($_GET['id']); // Mendapatkan customerid dari query string

    // TODO 2: Tulis dan eksekusi query untuk mengambil informasi buku berdasarkan customerid
    $query = "SELECT * FROM customers WHERE customerid = ".$customerid;
    $result = $db->query($query);
    if (!$result) {
        die("Could not query the database: <br />".$db->error.'<br>Query: '.$query);
    }
    // $row = $result->fetch_assoc();
    // $name = $row['name'];
    // $address = $row['address'];
    // $city = $row['city'];

    // TODO 3: Handle konfirmasi penghapusan
    if (isset($_POST['confirm'])) {
        $deleteQuery = "DELETE FROM customers WHERE customerid = ".$customerid;
        $deleteResult = $db->query($deleteQuery);
        if (!$deleteResult) {
            die("Could not delete the record: <br />".$db->error.'<br>Query: '.$deleteQuery);
        } else {
            $db->close();
            header('Location: view_customer.php'); // Redirect to view page after delete
            exit;
        }
    } elseif (isset($_POST['cancel'])) {
        header("Location: view_customer.php"); // Redirect to view page if cancellation requested
        exit;
    }
}
?>


<?php include('./header.php'); ?>
<div class="card mt-5">
    <div class="card-header">Confirm Delete Customer</div>
    <div class="card-body">
        <p>Are you sure you want to delete the following customer?</p>
        <table class="table">
            <tr>
                <th>Customer Id</th>
                <td><?= $customerid; ?></td>
            </tr>
            <tr>
                <th>Name</th>
                <td><?= $name; ?></td>
            </tr>
            <tr>
                <th>Address</th>
                <td><?= $address; ?></td>
            </tr>
            <tr>
                <th>City</th>
                <td><?= $city; ?></td>
            </tr>
        </table>
        <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) . '?id=' . $customerid; ?>" method="POST">
            <button type="submit" class="btn btn-danger" name="confirm">Confirm Delete</button>
            <button type="submit" class="btn btn-secondary" name="cancel">Cancel</button>
        </form>
    </div>
</div>
<footer class="footer bg-light text-center py-3">
        <div class="container">
            <?php include('./footer.php') ?>
        </div>
        <div class="madeby">
            <p style=" position: fixed;bottom: 0;width: 100%;background-color: #f8f9fa;text-align: center;padding: 10px 0;">Made with &#10084; by <strong>kelompok 2</strong></p>
        </div>
</footer>
