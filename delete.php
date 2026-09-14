<?php
$koneksi = mysqli_connect("localhost", "root", "", "dictionary");

if(!$koneksi){
    die("Koneksi Gagal: " . mysqli_connect_error());
}

if (isset($_GET['id'])) {
    
    $id = intval($_GET['id']);

    $hapusQuery = "DELETE FROM syntax WHERE id = $id";

    if(mysqli_query($koneksi, $hapusQuery)) {
        
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
} else {
    
    header("Location: index.php");
    exit();
}
?>