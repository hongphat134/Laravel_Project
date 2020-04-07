@extends('admin.layouts.master')
@section('content')
<link rel="stylesheet" href="public/css/styles.css">
<link rel="stylesheet" href="public/toastr/toastr.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>
<script src="public/js/jquery.min.js"></script>
<script src="public/js/jquery.easypiechart.min.js"></script>
<script src="public/toastr/toastr.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                    <canvas id="line-chart"></canvas>
                    <h1 class="text-center">Total of Books Sold by Month in 2020</h1>
                </div>                
            </div>
        </div>
    </div>
    
    <div class="row">
      <div class="box">
        <div class="chart" data-percent="{{$bookSellRate}}">
          <div class="percent"></div>
          <h4>Book Sell Rate</h4>
      </div>    
    </div>
     <div class="box">
        <div class="chart" data-percent="{{$CanceledOrderRate}}">
          <div class="percent"></div>
          <h4>Cancel Order Rate</h4>
        </div>    
    </div>
     <div class="box">
        <div class="chart" data-percent="{{$UnhandleOrderRate}}">
          <div class="percent"></div>
          <h4>Unhandle Order Rate</h4>
        </div>    
    </div>
     <div class="box">
        <div class="chart" data-percent="{{$HandingOrderRate}}">
          <div class="percent"></div>
          <h4>Handing Order Rate</h4>
        </div>    
    </div>
    </div>
   ><h1 class="text-center easypie"><label for="Easypie">Easypie Chart in 2020</label></h1>
    <span class="btn js_update">Update chart</span>
</div>

<?php 
  $data = array();
  $listMonth = ["Jan", "Feb", "Mar", "Apr", "May", "June","July","August","Sep","Oct","Nov","Dec"];

  foreach ($listMonth as $month) {
      $data[$month] = [
           "book" => 0,
          "order" => 0,
          "user" => 0
      ];
  }

  foreach ($listTotalBookSell as $bookSell) {
    $data[$listMonth[$bookSell['month'] - 1]]['book'] = (int)$bookSell['sum'];
  }

  foreach ($listTotalOrder as $order) {
    $data[$listMonth[$order['month'] - 1]]['order'] = (int)$order['count'];
  }

  foreach ($listTotalUser as $user) {
    $data[$listMonth[$user['month'] - 1]]['user'] = (int)$user['count'];
  }

  // var_dump($data);

  $bookInfo = ''; $orderInfo = ''; $userInfo = '';

  foreach ($data as $value) {
    $bookInfo .= $value['book'].',';
    $orderInfo .= $value['order'].',';
    $userInfo .= $value['user'].',';
  }

?>

<script type="text/javascript">
    window.onload = function () {
        Chart.defaults.global.defaultFontColor = '#000000';
        Chart.defaults.global.defaultFontFamily = 'Arial';
        var lineChart = document.getElementById('line-chart');
      
        var myChart = new Chart(lineChart, {
            type: 'bar',
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "June","July","August","Sep","Oct","Nov","Dec"],
                datasets: [
                    {
                        label: 'Book Sell',
                        data: [{{$bookInfo}}],//[1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
                        backgroundColor: 'rgba(0, 0, 0 , 1)',
                        borderColor: 'rgba(255 ,255 ,0)',
                        borderWidth: 2
                    },
                    {
                        label: 'New Order',
                        data: [{{$orderInfo}}],//[1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
                        backgroundColor: 'rgba(0, 255, 255 , 0.7)',
                        borderColor: 'rgba(255 ,0 ,0)',
                        borderWidth: 2
                    },
                    {
                        label: 'New User',
                        data: [{{$userInfo}}],//[1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
                        backgroundColor: 'rgba(255, 0, 255 , 1)',
                        borderColor: 'rgba(100 ,100 ,100)',
                        borderWidth: 2
                    }
                ]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                },
            }
        });

        $('.chart').easyPieChart({
            //size : 150,
            barColor: "Green",
            scaleColor: "Blue",
            lineWidth: 10,
            trackColor: "Brown",
            lineCap: 'butt',
            animate: 1000,
            scaleLength : 3,
            rotate : 180,
            easing : 'easeOutElastic',
            onStep : function(from, to, percent) {
              $(this.el).find('.percent').text(Math.round(percent));
            }
        });

        var chart = window.chart = $('.chart').data('easyPieChart');
        $('.js_update').on('click', function() {
          chart.update(Math.random()*200-100);
        });
    };
</script>
@stop