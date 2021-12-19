
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
            <h1>Report Analitik</h1><br>
      <h3>Periode <?php echo $all_sentimen[count($all_sentimen)-1]->tanggalPosting. " s/d ".$all_sentimen[0]->tanggalPosting;?></h3>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-2">
					<?php
								$total = 0;
								$total_positif = 0;
								$total_negatif = 0;
								$total_netral = 0;

								$total_like = 0;
								$total_like_positif = 0;
								$total_like_negatif = 0;
								$total_like_netral = 0;

								if($total_sentimen->num_rows() > 0) {
									foreach($total_sentimen->result() as $row) {
										$total += $row->jumlah_sentimen;
										$total_like += $row->jumlah_like;

										if($row->sentimen == 'positif') {
											$total_positif = $row->jumlah_sentimen;
											$total_like_positif = $row->jumlah_like;
										}

										if($row->sentimen == 'negatif') {
											$total_negatif = $row->jumlah_sentimen;
											$total_like_negatif = $row->jumlah_like;
										}

										if($row->sentimen == 'netral') {
											$total_netral = $row->jumlah_sentimen;
											$total_like_netral = $row->jumlah_like;
										}
									}
								} ?>

								<h5 class="text-center">Total Tweet <br> <?php echo $total ?></h5>
								<h5 class="text-center">Total Positif <br> <?php echo $total_positif ?></h5>
								<h5 class="text-center">Total Negatif <br> <?php echo $total_negatif ?></h5>
								<h5 class="text-center">Total Netral <br> <?php echo $total_netral ?></h5>
							</div>
							<div class="col-2">
								<h5 class="text-center">Total Like <br> <?php echo $total_like ?></h5>
								<h5 class="text-center">Total Like Positif <br> <?php echo $total_like_positif ?></h5>
								<h5 class="text-center">Total Like Negatif <br> <?php echo $total_like_negatif ?></h5>
								<h5 class="text-center">Total Like Netral <br> <?php echo $total_like_netral ?></h5>
							</div>
						</div>
						<div class="row">
							<div class="col-5">
								<div class="chart-container">
									<div class="pie-chart-container">
										<canvas id="pie-chart"></canvas>
									</div>
								</div>
							</div>
							<div class="col-5">
								<div class="chart-container">
									<div class="line-chart-container">
										<canvas id="line-chart"></canvas>
									</div>
								</div>
							</div>
						</div>
					</div>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
<!-- jQuery -->
<script src="<?= base_url('assets/'); ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/'); ?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets/'); ?>dist/js/demo.js"></script>
<script>
	var cData = JSON.parse(`<?php echo $chart_data; ?>`);
  $(function(){
      //get the pie chart canvas
      var ctx = $("#pie-chart");

      //pie chart data
      var data = {
        labels: cData.label,
        datasets: [
          {
            label: "Users Count",
            data: cData.data,
            backgroundColor: [
              "#0B6623",
              "#A9A9A9",
              "#DC143C",
              "#F4A460",
              "#2E8B57",
              "#1D7A46",
              "#CDA776",
            ],
            borderWidth: [1, 1, 1, 1, 1,1,1]
          }
        ]
      };

      //options
      var options = {
        responsive: true,
        title: {
          display: true,
          position: "top",
          text: "Presentase tiap sentimen",
          fontSize: 18,
          fontColor: "#111"
        },
        legend: {
          display: true,
          position: "bottom",
          labels: {
            fontColor: "#333",
            fontSize: 16
          }
        },
				tooltips: {
					callbacks: {
						label: function(tooltipItem, data) {
							return data['labels'][tooltipItem['index']] + ': ' + data['datasets'][0]['data'][tooltipItem['index']] + '%';
						}
					}
				}
      };

      //create Pie Chart class object
      var chart1 = new Chart(ctx, {
        type: "pie",
        data: data,
        options: options
      });

  });
</script>
<script>


var line_sentimen = document.getElementById("line-chart");

Chart.defaults.global.defaultFontFamily = "Lato";
Chart.defaults.global.defaultFontColor = "black";
Chart.defaults.global.defaultFontSize = 12;

var dataFirst = {
    label: 'positif',
    data: cData.line_data_positif,
    lineTension: 0.3,
    fill: false,
    borderColor: 'green',
    backgroundColor: 'transparent',
    pointBorderColor: 'green',
    pointBackgroundColor: 'green',
    pointRadius: 5,
    pointHoverRadius: 7,
    pointHitRadius: 7,
    pointBorderWidth: 2,
    pointStyle: 'rect'
  };

var dataSecond = {
		label: 'netral',
    data: cData.line_data_netral,
    lineTension: 0.3,
    fill: false,
    borderColor: 'gray',
    backgroundColor: 'transparent',
    pointBorderColor: 'gray',
    pointBackgroundColor: 'gray',
    pointRadius: 5,
    pointHoverRadius: 7,
    pointHitRadius: 7,
    pointBorderWidth: 2,
    pointStyle: 'cross'
  };

  var datathird = {
    label: 'negatif',
    data: cData.line_data_negatif,
    lineTension: 0.3,
    fill: false,
    borderColor: 'red',
    backgroundColor: 'transparent',
    pointBorderColor: 'red',
    pointBackgroundColor: 'red',
    pointRadius: 5,
    pointHoverRadius: 7,
    pointHitRadius: 7,
    pointBorderWidth: 2,
    pointStyle: 'rect',
  };

var lineData = {
  labels:  cData.line_label,
  datasets: [dataFirst, dataSecond,datathird]
};

var chartOptions = {
	title: {
		display: true,
		position: "top",
		text: "Jumlah sentimen per tanggal",
		fontSize: 18,
		fontColor: "#111"
	},
  legend: {
    display: true,
    position: 'top',
    labels: {
      boxWidth: 80,
      fontColor: 'black'
    }
  },
  scales: {
         yAxes: [{
             ticks: {
                 beginAtZero: true,
                 userCallback: function(label, index, labels) {
                     // when the floored value is the same as the value we have a whole number
                     if (Math.floor(label) === label) {
                         return label;
                     }

                 },
             }
         }],
         xAxes: [{
        ticks: {
          autoSkip: false,
          maxRotation: 90,
          minRotation: 0,
        }
      }]

     },


};

var lineChart = new Chart(line_sentimen, {
  type: 'line',
  data: lineData,
  options: chartOptions
});

    </script>
</body>
</html>
