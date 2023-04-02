<?php
error_reporting(0);
include 'konek.php';

if (isset($_GET["NIK"])) {
  $NIK = $_GET["NIK"];

  $result = mysqli_query($konek, "SELECT * FROM survei WHERE NIK = '$NIK'");
  
  while($row = mysqli_fetch_array($result)){
    $NIK = $row["NIK"];
    $jenis_kelamin = $row["jenis_kelamin"];
    $jenis_kamera = $row["jenis_kamera"];
    $jenis_lensa = $row["jenis_lensa"];
    $merk_kamera = $row["merk_kamera"];
    $tanggal = $row["tanggal"];
    $guna = $row["guna"];
    $foto = $row["foto"];
    
  }
}else{
  header('Location:indexx.php');
  
}

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Edit Data Survei</title>
  </head>
  <body>
    <form action="prosesedit.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
      <fieldset>
        <legend><h3>Edit Data Survei</h3></legend>
        <table>
          <tr>
            <td>NIK</td>
            <td>:</td>
            <td>
              <input name="NIK" type="text" id="NIK" size="50" readonly value="
              <?php echo $NIK ?>" />
            </td>
          </tr>
          <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td>
              <label for="pria"><input type="radio" id="pria" name="jenis_kelamin" value="Laki-laki" <?php echo ($jenis_kelamin == 'Laki-laki') ? 'checked' : '' ?>> Laki-laki</label>
              <label for="wanita"><input type="radio" id="wanita" name="jenis_kelamin" value="Perempuan" <?php echo ($jenis_kelamin == 'Perempuan') ? 'checked' : '' ?>> Perempuan</label>
              
            
            </td>
            
          </tr>
          <tr>
            <td>Jenis Kamera</td>
            <td>:</td>
            <td>
              <input type="checkbox" name="jenis_kamera[]" id="DSLR" value="DSLR" <?php echo ($jenis_kamera == 'DSLR') ? 'checked' : '' ?>> DSLR<br>
              <input type="checkbox" name="jenis_kamera[]" id="Mirrorless" value="Mirrorless" <?php echo ($jenis_kamera == 'Mirrorless') ? 'checked' : '' ?>> Mirrorless<br>
              <input type="checkbox" name="jenis_kamera[]" id="pocket"  value="Pocket" <?php echo ($jenis_kamera == 'Pocket') ? 'checked' : '' ?>> Pocket<br>
              <input type="checkbox" name="jenis_kamera[]" id="film"  value="Film" <?php echo ($jenis_kamera == 'Film') ? 'checked' : '' ?>> Film<br>
              
             
            </td>
            
          </tr>
          <tr>
            <td>Jenis Lensa</td>
            <td>:</td>
            <td>
              <input type="checkbox" name="jenis_lensa[]" id="Kit" value="Kit" <?php echo ($jenis_lensa == 'Kit') ? 'checked' : '' ?>> Kit<br>
              <input type="checkbox" name="jenis_lensa[]" id="Fix" value="Fix" <?php echo ($jenis_lensa == 'Fix') ? 'checked' : '' ?>> Fix<br>
              <input type="checkbox" name="jenis_lensa[]" id="Tele" value="Tele" <?php echo ($jenis_lensa == 'Tele') ? 'checked' : '' ?>> Tele<br>
              <input type="checkbox" name="jenis_lensa[]" id="Makro" value="Makro" <?php echo ($jenis_lensa == 'Makro') ? 'checked' : '' ?>> Makro<br>
              
            </td>
                
                </tr>
                <tr>
                    <td>Merk Kamera</td>
                    <td>:</td>
                    <td>
                      <input type="checkbox" name="merk_kamera[]" id="Canon" value="Canon" <?php echo ($merk_kamera == 'canon') ? 'checked' : '' ?>> Canon<br>
                      <input type="checkbox" name="merk_kamera[]" id="Sony" value="Sony" <?php echo ($merk_kamera == 'Sony') ? 'checked' : '' ?>> Sony<br>
                      <input type="checkbox" name="merk_kamera[]" id="Nikon" value="Nikon"<?php echo ($merk_kamera == 'Nikon') ? 'checked' : '' ?>> Nikon<br>
                      <input type="checkbox" name="merk_kamera[]" id="Leica" value="Leica" <?php echo ($merk_kamera == 'Leica') ? 'checked' : '' ?>> Leica<br>
                      <input type="checkbox" name="merk_kamera[]" id="Fuji" value="Fuji" <?php echo ($merk_kamera == 'Fuji') ? 'checked' : '' ?>> Fuji<br>
                     
                    </td>
                    
                </tr>
                <tr>
                <td>Tanggal Memiliki Kamera</td>
                <td>:</td>
                <td><input type="date" name="tanggal" value="<?php echo $tanggal; ?>" /></td>
                </tr>
                <tr>
                    <td>Penggunaan Kamera</td>
                    <td>:</td>
                    <td>
                        <input type="checkbox" name="guna[]" id="Alam" value="Alam" <?php echo ($guna == 'Alam') ? 'checked' : '' ?>> Alam<br>
                        <input type="checkbox" name="guna[]" id="Ruangan" value="Ruangan" <?php echo ($guna == 'Ruangan') ? 'checked' : '' ?>> Ruangan<br>
                        <input type="checkbox" name="guna[]" id="Event" value="Event" <?php echo ($guna == 'Event') ? 'checked' : '' ?>> Event<br>
                        <input type="checkbox" name="guna[]" id="Jurnalis" value="Jurnalis" <?php echo ($guna == 'Jurnalis') ? 'checked' : '' ?>> Jurnalis<br>
                        <input type="checkbox" name="guna[]" id="Makanan" value="Makanan" <?php echo ($guna == 'Makanan') ? 'checked' : '' ?>> Makanan<br>
                        
                      </td>
                    
                </tr>
                <tr>
    <td>Hasil Foto</td>
    <td>:</td>
    <td>
        <?php if(!empty($foto)) { ?>
            <img src="image/<?php echo $foto; ?>" width="100" />
        <?php } ?>
        <br>
        <input type="file" name="foto" id="foto" />
    </td>
</tr>

                <tr>
                    <td></td>
                    <td></td>
                    <td><input type="submit" name="edit" id="edit" value="edit"></td>
                </tr>
                </table>
            </fieldset>

        </form>
    </body>
</html>
