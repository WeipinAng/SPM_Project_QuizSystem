<?php
require 'connect.php';
require 'keselamatan.php';

$sql = "SELECT * FROM pengguna WHERE nama LIKE '%$query%'";
$keputusan = mysqli_query($conn,$sql);

if(mysqli_num_rows($keputusan)!=0){
    echo"
    <tr>
        <th width=\"10%\">Bil.</th>
        <th width=\"30%\">Nama Murid</th>
        <th width=\"15%\">ID Pengguna</th>
        <th width=\"20%\">Kata Laluan</th>
        <th width=\"25%\">Tindakan</th>
    </tr>";
    while($row = $keputusan->fetch_assoc()){
        echo"
        <tr>
            <td>".$row['bil']."</td>
            <td>".$row['nama']."</td>
            <td>".$row['idpengguna']."</td>
            <td>".$row['katalaluan']."</td>
            <td>
                <a href=\"kemaskinimurid.php?idtopik=<?php echo $rows['idpengguna']; ?>\" class=\"kemaskinimurid\">Kemas Kini</a>
                <a href=\"hapuskanmurid.php?idtopik=<?php echo $rows['idpengguna']; ?>\" class=\"hapusmurid\" onclick=\"return confirm('Adakah anda ingin hapuskan kesemua rekod murid ini?')\">Hapuskan</a>
            </td>
        </tr>";
    }
}else{
    echo "<b>Tiada keputusan yang sepadan.</b>";
}

function getUsername($idpengguna,$conn){
    $sql = "SELECT nama FROM pengguna WHERE idpengguna='$idpengguna'";
    $keputusan = mysqli_query($conn,$sql);
    if(mysqli_num_rows($keputusan)!=0){
        while($row = $keputusan->fetch_assoc()){
            return $row ['nama'];
        }
    }else{
        return "Pengguna tidak wujud";
    }
}
?>