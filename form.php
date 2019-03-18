<?php

    include'../connect.php';

    $query = "SELECT id_dosen, nama_dosen FROM dosen";
    $result = mysqli_query($connect, $query);

?>