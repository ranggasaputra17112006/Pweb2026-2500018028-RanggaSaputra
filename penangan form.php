<!DOCTYPE html>
<html>
<head>
    <title>Aplikasi Nilai Mahasiswa</title>
    <style>
        body{
            font-family: Arial;
            margin:40px;
        }
        table{
            border-collapse:collapse;
        }
        td{
            padding:8px;
        }
    </style>
</head>
<body>

<h2>Aplikasi Penilaian Mahasiswa</h2>

<form method="post">

<table>
<tr>
    <td>Nama Mahasiswa</td>
    <td><input type="text" name="nama" required></td>
</tr>

<tr>
    <td>Nilai Tugas</td>
    <td><input type="number" name="tugas" required></td>
</tr>

<tr>
    <td>Nilai UTS</td>
    <td><input type="number" name="uts" required></td>
</tr>

<tr>
    <td>Nilai UAS</td>
    <td><input type="number" name="uas" required></td>
</tr>

<tr>
    <td></td>
    <td><input type="submit" name="proses" value="Hitung"></td>
</tr>

</table>

</form>

<?php

// Function menghitung rata-rata
function hitungRata($nilai)
{
    return array_sum($nilai) / count($nilai);
}

// Function menentukan grade
function grade($rata)
{
    if($rata>=85)
        return "A";
    elseif($rata>=75)
        return "B";
    elseif($rata>=65)
        return "C";
    elseif($rata>=50)
        return "D";
    else
        return "E";
}

if(isset($_POST['proses']))
{

    $nama=$_POST['nama'];

    // Array nilai
    $nilai=array(
        "Tugas"=>$_POST['tugas'],
        "UTS"=>$_POST['uts'],
        "UAS"=>$_POST['uas']
    );

    $rata=hitungRata($nilai);
    $grade=grade($rata);

    echo "<hr>";

    echo "<h3>Hasil Penilaian</h3>";

    echo "Nama : <b>$nama</b><br><br>";

    echo "<table border='1' cellpadding='8'>";
    echo "<tr>
            <th>Komponen</th>
            <th>Nilai</th>
          </tr>";

    foreach($nilai as $komponen=>$isi)
    {
        echo "<tr>";
        echo "<td>$komponen</td>";
        echo "<td>$isi</td>";
        echo "</tr>";
    }

    echo "</table>";

    echo "<br>";

    echo "<b>Rata-rata :</b> ".number_format($rata,2)."<br>";
    echo "<b>Grade :</b> ".$grade;

}

?>

</body>
</html>