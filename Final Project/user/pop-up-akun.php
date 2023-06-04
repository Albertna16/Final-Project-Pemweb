<?php
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('conn.php');

  $status = '';
  $result = '';
  //melakukan pengecekan apakah ada variable GET yang dikirim
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['ID_USER'])) {
          //query SQL
          $id_user_upd = $_GET['ID_USER'];
          $query = $conn->prepare("SELECT EMAIL_USER, USERNAME_USER FROM user WHERE ID_USER = :ID_USER");

          //binding data
          $query->bindParam(':ID_USER', $id_user_upd);

          //eksekusi query
          $query->execute();

          //fetch data
          $data = $query->fetch(PDO::FETCH_ASSOC);

      }
    }
  
    //melakukan pengecekan apakah ada form yang dipost
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id_user = $_POST['ID_USER'];
        $email_user = $_POST['EMAIL_USER'];
        $username_user = $_POST['USERNAME_USER'];
        $foto_nama = $_FILES['FOTO_USER']['name'];
        $foto_size = $_FILES['FOTO_USER']['size'];

        if ($foto_size > 2097152) {
            // Jika File lebih dari 2 MB maka akan gagal mengupload File
            $status = 'err';
            header('Location: user-profil.php?status='.$status);
        } else {
            // Mengecek apakah Ada file yang diupload atau tidak
            if ($foto_nama != "") {
        
              // Ekstensi yang diperbolehkan untuk diupload boleh diubah sesuai keinginan
              $ekstensi_izin = array('png', 'jpg', 'jpeg');
              // Memisahkan nama file dengan Ekstensinya
              $pisahkan_ekstensi = explode('.', $foto_nama);
              $ekstensi = strtolower(end($pisahkan_ekstensi));
              // Nama file yang berada di dalam direktori temporer server
              $file_tmp = $_FILES['FOTO_USER']['tmp_name'];

              // Jika ekstensi tidak sesuai
              $status = 'err';
              header('Location: user-profil.php?status='.$status);

              if (in_array($ekstensi, $ekstensi_izin) === true) {
                // Mengambil data sampul didalam table buku
                $get_foto = "SELECT FOTO_USER FROM user WHERE ID_USER=:ID_USER";
                $query = $conn->prepare($get_foto);
                $query->bindParam(':ID_USER', $id_user);
                $query->execute();
                $foto_lama = $query->fetch(PDO::FETCH_ASSOC);

                unlink("foto-profil-user/" . $foto_lama['FOTO_USER']);

                move_uploaded_file($file_tmp, 'foto-profil-user/' . $foto_nama);

                $query = "UPDATE user SET EMAIL_USER=:EMAIL_USER, USERNAME_USER=:USERNAME_USER, FOTO_USER=:FOTO_USER WHERE ID_USER=:ID_USER";
                
                $query = $conn->prepare($query);

                $query->bindParam(':ID_USER', $id_user);
                $query->bindParam(':EMAIL_USER', $email_user);
                $query->bindParam(':USERNAME_USER', $username_user);
                $query->bindParam(':FOTO_USER', $foto_nama);

                //eksekusi query
                if ($query->execute()) {
                    $status = 'ok';
                }
                else{
                    $status = 'err';
                }
  
                //redirect ke halaman lain
                header('Location: user-profil.php?status='.$status);
              }
            } else {
                $query = "UPDATE user SET EMAIL_USER=:EMAIL_USER, USERNAME_USER=:USERNAME_USER WHERE ID_USER=:ID_USER";
                
                $query = $conn->prepare($query);

                $query->bindParam(':ID_USER', $id_user);
                $query->bindParam(':EMAIL_USER', $email_user);
                $query->bindParam(':USERNAME_USER', $username_user);

                //eksekusi query
                if ($query->execute()) {
                    $status = 'ok';
                }
                else{
                    $status = 'err';
                }
  
                //redirect ke halaman lain
                header('Location: user-profil.php?status='.$status);
            }
        }
    }

?>

    <?php if (!empty($data)): ?>
        <div class="popup-overlay" id="popup-akun">
            <div class="popup-content">
                <h2 class="popup-title">Akun Saya</h2>
                <span class="popup-close" onclick="closePopup('popup-akun')"><i class="fas fa-times"></i></span>
                <form class="popup-form" action="pop-up-akun.php" method="POST" enctype="multipart/form-data">
                    <label for="upload-foto">Foto Profil</label>
                    <input type="file" id="upload-foto" name="FOTO_USER">
                    <?php if ($data['FOTO_USER'] == "") { ?>
                        <img src="https://via.placeholder.com/500x500.png?text=TIDAK+ADA+FOTO" style="width:100px;height:100px;">
                    <?php }else{ ?>
                        <img src="foto-profil-user/<?php echo $data['FOTO_USER']; ?>" style="width:100px;height:100px;">
                    <?php } ?>
                    <p style="font-size: 12px;">Catatan: <br> ukuran foto tidak boleh lebih dari 2 MB <br> ekstensi yang diperbolehkan png, jpg, dan jpeg </p>
                    <input type="hidden" name="ID_USER" value="<?php echo $data['ID_USER']; ?>">
                    <label for="ubah-nama">Nama</label>
                    <input type="text" id="ubah-nama" name="USERNAME_USER" value="<?php echo $data['USERNAME_USER'];  ?>" required="required">
                    <label for="ubah-email">E-mail</label>
                    <input type="text" id="ubah-email" name="EMAIL_USER" value="<?php echo $data['EMAIL_USER'];  ?>" required="required">
                    <button class="btn-save" type="submit">Simpan</button>
                </form>
            </div>
        </div>
    <?php endif; ?>