
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
                <h3 class="card-title">Edit Kata</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <div class="card-body">
                  <div class="form-group row">
                    <label for="kata" class="col-sm-2 col-form-label">Kata</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="kata" name="kata" placeholder="Contoh : Benar"
                      v-model="form.kata" readonly>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="tingkat_sentimen" class="col-sm-2 col-form-label">Tingkat Sentimen</label>
                    <div class="col-sm-10">
                      <select class="form-control" name="tingkat_sentimen" id="tingkat_sentimen"
                      v-model="form.tingkat_sentimen">
                        <option selected disabled value="">Pilih Tingkat Sentimen</option>
                            <option value="positif">Positif</option>
                            <option value="negatif">Negatif</option>
                            <option value="netral">Netral</option>
                          </select>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button class="btn btn-info float-right" v-on:click="onSave()"
                  style="margin-left: 20px">Perbarui Kata</button>
                    <button class="btn btn-info float-right" v-on:click="onDelete()">Hapus Kata</button>
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
<!-- Dirty script menggabungkan php dengan vueJS -->
<script>
let kataLama = "<?php echo $kata[0]->kata;  ?>"
let sentimenLama = "<?php echo $kata[0]->sentimen ?>"
</script>
<script>
  var app = new Vue({
    el: '#form-kata',
    data: {
      form : {
              kata : "",
              tingkat_sentimen : ""
      }
    },
    methods : {
      validation: function(){
        let isValid = true;
          if(this.form.kata == ""){
            isValid = false;
          }
          if(this.form.tingkat_sentimen == ""){
            isValid = false;
          }
          return isValid;
      },
      checkOldData: function(){
        if(!kataLama)
          return
        else {
          this.form.kata = kataLama;
          this.form.tingkat_sentimen = sentimenLama;
        }
      },
      onSave: async function(){
        try{
          if(this.validation() == false){
            toastr.warning("Harap mengisi form isian!")
            return
          } else {
            let formData = {...this.form};
            const res = await fetch("<?php echo base_url()."API/update_kata" ?>",{
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
              window.location = "<?php echo base_url()."Bank/" ?>";
            }, 1000);
          }
          }
        }catch(err){
          console.log(err)
        }
      },
      onDelete: async function(){
        try{
            if(confirm("Apakah anda yakin ingin mengahpus kata " + kataLama + "?")){
              let formData = {...this.form};
              const res = await fetch("<?php echo base_url()."API/delete_kata" ?>",{
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
                window.location = "<?php echo base_url()."Bank/" ?>";
              }, 1000);
            }
            }
        }catch(err){
          console.log(err)
        }
    }
  },
    mounted(){
      console.log("Vue sukses diload!")
      this.checkOldData()
    }
  });
</script>
</body>
</html>
