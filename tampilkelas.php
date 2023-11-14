<?php
include_once('config.php');
//hapus kelas
$id = isset($_GET['id'])?$_GET['id']:"";
if($id != ""){
    $del = mysqli_query($conn, "delete from kelas where idkelas=$id");
    if($del){
        ?>
        <script>
            alert('Hapus Berhasil');
            location.href='?hal=tampilkelas';
            </script>
            <?php
    }
}
$query = mysqli_query($conn, "select * from kelas order by nama_kelas ASC");

?>
<a href="?hal=tambahkelas">Tambah Data Kelas</a>
<br>
<br>
<table border="1" cellspacing=0 cellpading=0 widt="80%">
    <tr>
        <th>No</th>
        <th>Nama kelas</th>
        <th>Jurusan</th>
        <th>Edit</th>
        <th>Hapus</th>
</tr>
<?php
      $no=1;
      while($baris = mysqli_fetch_array($query)){
        ?>
           <tr>
            <td><?=$no++?></td>
            <td><?=$baris['nama_kelas']?></td>
            <td><?=$baris['jurusan']?></td>
            <td>
                <a href="?hal=editkelas&id=<?=$baris['idkelas']?>">edit</a>
      </td>
      <td>
        <a href="?hal=tampilkelas&id=<?=$baris['idkelas']?>" onclik="return confirm('Yakin akan dihapus?');">Hapus</a>
             </td>
           </tr>
         <?php
       }
       ?>
    </table>

