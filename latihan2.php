<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<button type="submit" name="kirim" value="cetak"><a href="latihan1.php">Kembali</a></button>
    <?php
    session_start();
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
    }
    
    echo '</table>';
    ?>
</body>
</html>