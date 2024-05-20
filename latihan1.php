<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>
<body>
    <form action="" method="post">
    <h1>Masukan Data Siswa</h1>
    <label for="nama">NAMA :</label>
    <input type="text" id="nama" name="nama"><br></br>
    <label for="nama">NIS :</label>
    <input type="number" id="nis" name="nis"><br></br>
    <label for="nama">Rayon :</label>
    <input type="text" id="rayon" name="rayon"><br></br>
    <button type="submit" name="kirim" value="kirim"><i class='bx bx-plus'></i> SUBMIT</button>
    <button type="submit" name="kirim" value="cetak"><a href="latihan2.php"><i class='bx bx-printer'></i> CETAK</a></button>
    <button type="submit" name="kirim" value="hapusdata"><a href="latihan3.php"><i class='bx bxs-trash'></i> Hapus Data</a></button>
    <?php
    session_start();

    if(!isset($_SESSION['dataSiswa'])){
        $_SESSION['dataSiswa']= array ();
    };
    
    if(isset($_POST['nama']) && isset($_POST['nis']) && isset($_POST['rayon'])){
        $data = array(
            'nama' => $_POST['nama'],
            'nis' => $_POST['nis'],
            'rayon' => $_POST['rayon'],
        );
        array_push($_SESSION['dataSiswa'], $data);
    };
    
    if(isset($_GET['hapus'])) {
        $index = $_GET['hapus'];
        unset($_SESSION['dataSiswa'][$index]);
        header('Location: http://localhost/latihan_session/latihan1.php');
        exit;
    };
    

    echo '<table border="1">';
    echo '<tr>';
    echo '<th>NAMA</th>';
    echo '<th>NIS</th>';
    echo '<th>RAYON</th>';
    echo '<th>AKSI</th>';
    echo '</tr>';
    
    foreach($_SESSION['dataSiswa']  as $index => $value){
        echo '<tr>';
        echo '<td>' . $value['nama'] . '</td>';
        echo '<td>' . $value['nis'] . '</td>';
        echo '<td>' . $value['rayon'] . '</td>';
        echo '<td><a href="?hapus='.$index.'" class="btn btn-denger btn-sm">Hapus</a></td>';
        echo '</tr>';
    };
    
    echo '</table>';
    ?>
    </form>
</body>
</html>