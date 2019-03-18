<?php

include '../connect.php';

$kode = $_POST['kode'];
$id_dosen = $_POST['id'];
$nama_matkul = $_POST['nama_matkul'];
$sks = $_POST['sks'];
$semester = $_POST['semester'];

$query ="UPDATE Matakuliah SET nama_matkul = '$nama_matkul',
                               sks = $sks,
                               semester = $semester,
                               id = $id_dosen
        WHERE kode = '$kode'";

$result = mysqli_query($connect, $query);
$num = mysqli_affected_rows($connect);

if($num > 0)
{
    echo "Berhasil Ubah Data <br>";
}
else
{
    echo "Gagal Ubah Data <br>";
}

echo "<a href='read.php'> Lihat Data</a>";
?>