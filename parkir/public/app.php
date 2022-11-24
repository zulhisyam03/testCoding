<?php

//membuat koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "parkir");

//variabel nim yang dikirimkan form.php
$noPolisi = $_GET['noPolisi'];

//mengambil data
$query = mysqli_query($koneksi, "select * from checkouts where noPolisi='$noPolisi'");
$checkout = mysqli_fetch_array($query);
$data = array(
            'tglMasuk'      =>  @$checkout['tglMasuk'],
            'jenisKendaraan'      =>  @$checkout['jenisKendaraan'],
);
//tampil data
echo json_encode($data);
?>