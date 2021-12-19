<?php
use Abraham\TwitterOAuth\TwitterOAuth;
$sentiment = new \PHPInsight\Sentiment();
$connection = new TwitterOAuth('Oadgku9IWIz7eQWCGQQo6QMwt', 'pZKcMWMYIjBAMICJgS4QX5FfDf3ZSDAvWcNPCm6A6KX8vLgez1', '1156935537774587905-45EL5NsQr8NkfW0qtgQ6ityi9MGrrP', 'uWNQCvHG8tRM4sB0ziOyojkY3nladi1485LvNf6QUV2aa');
$content = $connection->get("account/verify_credentials");
$penerimaan = $connection->get("search/tweets", ['exclude_replies' => true, 'q' => 'penerimaan unpad', 'tweet_mode' => 'extended']);

$tweet_penerimaan = $penerimaan->statuses;
usort( $tweet_penerimaan, function( $a, $b) {
  if( $a->favorite_count == $b->favorite_count)
  return 0;
  return $a->favorite_count < $b->favorite_count ? 1 : -1;
});

//Get Trending Penelitian
$trend_penerimaan = $connection->get("search/tweets", ['exclude_replies' => true, 'q' => '#penerimaan', 'tweet_mode' => 'extended']);
$trend_penerimaan = $trend_penerimaan->statuses;
//Sorting untuk get tweets dengan likes terbanyak
usort( $trend_penerimaan, function( $a, $b) {
  if( $a->favorite_count == $b->favorite_count)
  return 0;
  return $a->favorite_count < $b->favorite_count ? 1 : -1;
});

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title; ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets/');?>plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/');?>/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Left navbar links -->
  <?php $this->load->view('partials/navbar');?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
    <?php $this->load->view('partials/left-navbar');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Trending #Penerimaan</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <section class="clean-block clean-blog-list dark">
                      <div class="container">
                          <div class="block-content">
                            <?php
                            foreach($tweet_penerimaan as $tweet){
                              $scores = $sentiment->score($tweet->full_text);
                              $class = $sentiment->categorise($tweet->full_text);
                              ?>
                              <div class="clean-blog-post">
                                  <div class="row">
                                      <div class="col-lg-5"><img class="rounded img-fluid" src="<?php echo $tweet->user->profile_image_url;?>"></div>
                                      <div class="col-lg-7">
                                          <h3>@<?php echo $tweet->user->name; ?></h3>
                                          <div class="info"><span class="text-muted"><?php echo $tweet->created_at; ?></span></div>
                                          <p><?php echo $tweet->full_text;?></p>
                                          <p>Tweet ini mengandung sentimen <b> <?php echo $class;?></b></p>
                                      </div>
                                  </div>
                              </div>
                              <?php
                            }
                            ?>
                            <?php
                            foreach($trend_penerimaan as $tweet){
                              $scores = $sentiment->score($tweet->full_text);
                              $class = $sentiment->categorise($tweet->full_text);
                              ?>
                              <div class="clean-blog-post">
                                  <div class="row">
                                      <div class="col-lg-5"><img class="rounded img-fluid" src="<?php echo $tweet->user->profile_image_url;?>"></div>
                                      <div class="col-lg-7">
                                          <h3>@<?php echo $tweet->user->name; ?></h3>
                                          <div class="info"><span class="text-muted"><?php echo $tweet->created_at; ?></span></div>
                                          <p><?php echo $tweet->full_text;?></p>
                                          <p>Tweet ini mengandung sentimen <b> <?php echo $class;?></b></p>
                                      </div>
                                  </div>
                              </div>
                              <?php
                            }
                            ?>
                          </div>
                      </div>
                  </section>
          <!-- /.col -->
        </div>
      </div><!-- /.container-fluid -->
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
<!-- AdminLTE App -->
<script src="<?= base_url('assets/'); ?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets/'); ?>dist/js/demo.js"></script>
</body>
</html>
