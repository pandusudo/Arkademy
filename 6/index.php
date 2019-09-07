<?php 
include('layout/header.php');
$query = "SELECT * from nama";
$result = $conn->query($query);
$num = $result->num_rows;
if ($num < 1) {
  ?>
  <div class="container-fluid p-3">
    <div class="alert alert-danger p-5">
      <h1>Tidak Ada Pekerja!</h1>
    </div>
  </div>
  <?php
}else {
 ?>

  <div class="container-fluid p-5">
    <h2 class="mt-3">Daftar Pekerja</h2>
    <button type="button" data-toggle="modal" data-target="#addmodal" id="add" style="background: #fcba03; border: 0px;" class="btn btn-primary mt-4" name="button">Tambah</button><br><br>
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">Nama</th>
          <th scope="col">Work</th>
          <th scope="col">Salary</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
      <?php
      $query = "SELECT nama.*, work.name, kategori.salary FROM nama JOIN work on nama.id_work = work.id JOIN kategori ON work.id_salary = kategori.id";
      $result = $conn->query($query);
      while($row = $result->fetch_assoc()){
  			echo "<tr class='item'>
  							<td>".$row['nama']."</td>
							<td>".$row['name']."</td>
  							<td>".$row['salary']."</td>
                <td> <button class='btn btn-danger' data-toggle='modal' data-target='#deletemodal-".$row['id']."'>Delete</button> &nbsp; <button type='button' class='btn btn-primary' data-target='#editmodal-".$row['id']."' data-toggle='modal'>Edit</button> </td>
  						</tr>";
      ?>
      <!-- edit modal -->
      <div class="modal fade" id="editmodal-<?php echo $row['id']?>">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit</h4>
              <button type="button" data-dismiss="modal" class="close">&times;</button>
            </div>

            <form class="" action="update.php?kode=<?php echo $row['id']; ?>" method="post">
            <div class="modal-body">

              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" name="nama" id="nama" value="<?php echo $row['nama'] ?>">
              </div>

              <div class="form-group">
                 <label for="work">Work</label>
                 <select class="form-control" name="work">
                 <option value="">-- Pilih Pekerjaan --</option>
                          <?php
                          $id_work = $row['id_work'];
                          $query2 = "SELECT * from work";
                          $result2 = $conn->query($query2);
                          while ($row2 = $result2->fetch_assoc()) {
                            if ($id_work != $row2['id']) {
                              echo "<option value='".$row2['id']."'>".$row2['name']."</option>";
                            }else {
                              echo "<option selected value='".$row2['id']."'> ".$row2['name']."</option>";
                            }
                          }
                           ?>
                  </select>
                </div>
				
				<div class="form-group">
                 <label for="salary">Salary</label>
                 <select class="form-control" name="salary">
                 <option value="">-- Pilih Gaji --</option>
                          <?php
                          $id_salary = $row['id_salary'];
                          $query2 = "SELECT * from kategori";
                          $result2 = $conn->query($query2);
                          while ($row2 = $result2->fetch_assoc()) {
                            if ($id_work != $row2['id']) {
                              echo "<option value='".$row2['id']."'>".$row2['salary']."</option>";
                            }else {
                              echo "<option selected value='".$row2['id']."'> ".$row2['salary']."</option>";
                            }
                          }
                           ?>
                  </select>
                </div>
				</div>

            <div class="modal-footer">
              <button type="submit" name="update" class="btn btn-primary">Update</button>
              <button type="button" data-dismiss="modal" class="btn btn-danger" name="cancel">Cancel</button>
            </div>
          </form>
          </div>
        </div>
      </div>
      <!-- end of edit modal -->
      <!-- delete modal -->
      <div class="modal fade" id="deletemodal-<?php echo $row['id']?>">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Delete</h4>
              <button type="button" data-dismiss="modal" class="close">&times;</button>
            </div>

            <form class="" action="del.php?kode=<?php echo $row['id']?>" method="post">
            <div class="modal-body">
              <p>Anda yakin ingin delete data ini?</p>
            </div>

            <div class="modal-footer">
              <button type="submit" name="delete" class="btn btn-primary">Delete</button>
              <button type="button" data-dismiss="modal" class="btn btn-danger" name="cancel">Cancel</button>
            </div>
          </form>
          </div>
        </div>
      </div>
      <!-- end of delete modal -->
      <?php
  		}
  		 ?>
       </tbody>
    </table>

  <?php } ?>
    <!-- add modal -->
    <div class="modal fade" id="addmodal">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Tambah Pekerja</h4>
            <button type="button" data-dismiss="modal" class="close">&times;</button>
          </div>

          <form class="" action="save.php" method="post">
          <div class="modal-body">
            <div class="form-group">
              <label for="nama">Nama</label>
              <input class="form-control" type="text" name="nama" id='nama' value="">
            </div>

            <div class="form-group">
				<label for="work">Work</label>
				<select class="form-control" name="work">
				<option value="" selected>-- Pilih Pekerjaan --</option>
				<?php
				$query2 = "SELECT * from work";
				$result2 = $conn->query($query2);
				while ($row2 = $result2->fetch_assoc()) {
					echo "<option value='".$row2['id']."'>".$row2['name']."</option>";
				}
				?>
				</select>
			</div>
			
			<div class="form-group">
				<label for="salary">Salary</label>
				<select class="form-control" name="salary">
				<option value="" selected>-- Pilih Salary --</option>
				<?php
				$query2 = "SELECT * from kategori";
				$result2 = $conn->query($query2);
				while ($row2 = $result2->fetch_assoc()) {
					echo "<option value='".$row2['id']."'>".$row2['salary']."</option>";
				}
				?>
				</select>
			</div>
          <div class="modal-footer">
            <button type="submit" name="save" class="btn btn-primary">Save</button>
            <button type="button" data-dismiss="modal" class="btn btn-danger" name="cancel">Cancel</button>
          </div>
        </form>
        </div>
      </div>
    </div>
    <!-- end of add modal -->
    </div>
  </div>
</div>
  </body>
</html>
