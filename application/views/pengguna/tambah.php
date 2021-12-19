
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title; ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/toastr/toastr.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php $this->load->view('partials/navbar'); ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php $this->load->view('partials/left-navbar'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          <div id="form-kata" class="card card-info" style="margin-top: 20px; margin-left: 20px; margin-right: 20px;">
              <div class="card-header">
                <h3 class="card-title">Tambah Pengguna Baru</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <div class="card-body">
                  <div class="form-group row">
                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="username" name="username" placeholder="Contoh : Udean123"
                      v-model="form.username">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="namaAdmin" class="col-sm-2 col-form-label">Nama Admin</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="namaAdmin" name="namaAdmin" placeholder="Contoh : Akbar Fauzi"
                      v-model="form.namaAdmin">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password"
                      v-model="form.password">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="confirmPassword" class="col-sm-2 col-form-label">Konfirmasi Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Masukkan kembali password"
                      v-model="form.confirmPassword">
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button class="btn btn-info float-right" v-on:click="onSave()">Simpan</button>
                </div>
            </div>
          <!-- /.col -->
        </div>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url('assets/'); ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?= base_url('assets/'); ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/toastr/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/'); ?>dist/js/adminlte.min.js"></script>
<script>
  var app = new Vue({
    el: '#form-kata',
    data: {
      form : {
              username : "",
              password : "",
              namaAdmin : "",
              confirmPassword : ""
      }
    },
    methods : {
      validation: function(){
        let isValid = true;
          if(this.form.username == ""){
            isValid = false;
          }
          if(this.form.password == ""){
            isValid = false;
          }
          if(this.form.namaAdmin == ""){
            isValid = false;
          }
          if(this.form.confirmPassword == ""){
            isValid = false;
          }
          return isValid;
      },
      onSave: async function(){
        try{
          if(this.validation() == false){
            toastr.warning("Harap mengisi form isian!")
            return
          }
          if(this.form.password != this.form.confirmPassword){
            toastr.warning("Password dan konfirmasi password harus sama!")
            return
          }
          let formData = {...this.form};
          const res = await fetch("<?php echo base_url()."API/insert_pengguna" ?>",{
          method : 'POST',
          body : JSON.stringify(formData),
          headers: {'Content-Type': "application/json"}
        });
        const data = await res.json();
        //
        if(data.code == 0)
          toastr.error(data.message);
        else {
          toastr.success(data.message);
          let _this = this
          setTimeout(() => {
            window.removeEventListener('beforeunload', _this.leaving, true)
            window.location = "<?php echo base_url()."Pengguna/" ?>";
          }, 1000);
        }

        }catch(err){
          console.log(err)
        }
      }
    },
    mounted(){
      console.log("Vue sukses diload!")
    }
  });
</script>
</body>
</html>
