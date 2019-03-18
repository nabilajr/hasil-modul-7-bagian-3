<?php

include '../connect.php';

$kode = $_GET['kode'];

$query = "SELECT kode, nama_matkul, sks, semester, matakuliah.id, nama_dosen
          FROM Matakuliah LEFT JOIN Dosen USING(id)
          WHERE KODE = '$kode'";

$result = mysqli_query($connect, $query);

$data_dosen = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Page Title</title>
</head>
<body>
<h1>Ubah Data Matakuliah</h1>
    <form action="update.php" method="POST">
    <table>
    <tr>
        <td><label for="kode">Kode</label></td>
        <td>:</td>
        <td><input type="text" name="kode" id="kode" readonly value="<?php echo $data_dosen['kode']; ?>"></td>
    </tr>
    <tr>
        <td><label for="nama_matkul">Matakuliah</label></td>
        <td>:</td>
        <td><input type="text" name="nama_matkul" id="nama_matkul" value="<?php echo $data_dosen['nama_matkul']; ?>"></td>    
    </tr>
    <tr>
        <td><label for="sks">SKS</label></td>
        <td>:</td>
        <td><input type="number" name="sks" id="sks" value="<?php echo $data_dosen['sks']; ?>"></td>
    </tr>
    <tr>
        <td><label for="semester">Semester</label></td>
        <td>:</td>
        <td><input type="number" name="semester" id="semester" value="<?php echo $data_dosen['semester']; ?>"></td>
    </tr>
    <tr>
        <td><label for="nama_dosen">Dosen Pengajar</label></td>
        <td>:</td>
        <td><select name="id" id="nama_dosen">
            <option value="NULL">--Pilih Salah Satu--</option>
            <?php 
                $query2 = "SELECT id, nama_dosen FROM Dosen";
                $result2 = mysqli_query($connect, $query2);
                while ($data = mysqli_fetch_assoc($result2)) { ?>
                <option value="<?php echo $data['id']; ?> ">
                <?php echo $data['nama_dosen']; ?>
                <?php if ($data_dosen['id'] == $data ['id']) {echo "selected"; } ?>
                </option>
                <?php }
            ?>
            </select></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td><input type="submit" value="Simpan"></td>    
    </tr>
    </table>
    </form>
</body>
</html>