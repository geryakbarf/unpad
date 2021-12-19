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
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/toastr/toastr.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box" id="form-login">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
        <img src="<?= base_url('assets/'); ?>img/logo.png"
        style="width: 100%; height: auto;">
    </div>
    <div class="card-body">
      <p class="login-box-msg">Silahkan login untuk masuk ke website</p>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Usename"
          v-model="form.username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password"
          v-model="form.password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

          <div class="social-auth-links mt-2 mb-3">
            <button v-on:click="onSave()" class="btn btn-primary btn-block">Login</button>
          </div>
          <!-- /.col -->
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?= base_url('assets/'); ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/'); ?>dist/js/adminlte.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/toastr/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script>
  var app = new Vue({
    el: '#form-login',
    data: {
      form : {
              username : "",
              password : ""
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
          return isValid;
      },
      onSave: async function(){
        try{
          if(this.validation() == false){
            toastr.warning("Username dan Password harus diisi!")
            return
          } else {
            let formData = {...this.form};
            const res = await fetch("<?php echo base_url()."API/aksi_login" ?>",{
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
              window.location = "<?php echo base_url()."Dashboard" ?>";
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
    }
  });
</script>
</body>
</html>
