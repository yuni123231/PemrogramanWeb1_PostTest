<!DOCTYPE html>
<html lang="en">
<head>
    <title>Form Handling dan Validation</title>
</head>
<style>
    .error {color: #FF0000;}
</style>
<body>

<?php
$nim = $nama = $email = $alamat = "";
$nimErr = $namaErr = $emailErr = $alamatErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["nim"])) {
        $nimErr = "*NIM wajib diisi";
    } else {
        $nim = test_input($_POST["nim"]);
    }

    if (empty($_POST["nama"])) {
        $namaErr = "*Nama wajib diisi";
    } else {
        $nama = test_input($_POST["nama"]);
    }

    if (empty($_POST["email"])) {
        $emailErr = "*Email wajib diisi";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Format email tidak valid";
        }
    }

    if (empty($_POST["alamat"])) {
        $alamatErr = "*Alamat wajib diisi";
    } else {
        $alamat = test_input($_POST["alamat"]);
    }
}


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<h2>Form Handling dan Validation</h2>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    NIM: <input type="text" name="nim" value="<?php echo $nim; ?>">
    <span class="error"><?php echo $nimErr; ?></span>
    <br><br>

    Nama: <input type="text" name="nama" value="<?php echo $nama; ?>">
    <span class="error"><?php echo $namaErr; ?></span>
    <br><br>

    Email: <input type="text" name="email" value="<?php echo $email; ?>">
    <span class="error"><?php echo $emailErr; ?></span>
    <br><br>

    Alamat: <textarea name="alamat" rows="5" cols="40"><?php echo $alamat; ?></textarea>
    <span class="error"><?php echo $alamatErr; ?></span>
    <br><br>

    <input type="submit" name="submit" value="Submit">
</form>

<?php
// Menampilkan hasil default "NIM" dan "Nama" saya
echo "<h2>Hasil Default:</h2>";
echo "NIM: 22090011<br>";
echo "Nama: Tri Yuni Ayuningtyas<br>";
?>

<?php
// Tri Yuni Ayuningtyas
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    echo "<h2>Hasil Input:</h2>";
    echo "NIM : $nim";
    echo "<br>";
    echo "Nama : $nama";
    echo "<br>";
    echo "Email : $email";
    echo "<br>";
    echo "Alamat : $alamat";
    echo "<br>";
}
?>

</body>
</html>