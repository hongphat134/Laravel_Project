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
                </div>                
            </div>
        </div>
    </div>

    <div class="box">
        <div class="chart" data-percent="73">
          <div class="percent"></div>
      </div>    
    </div>
     <div class="box">
        <div class="chart" data-percent="85">
          <div class="percent"></div>
        </div>    
    </div>
     <div class="box">
        <div class="chart" data-percent="13">
          <div class="percent"></div>
        </div>    
    </div>
     <div class="box">
        <div class="chart" data-percent="44">
          <div class="percent"></div>
        </div>    
    </div>
    <span class="btn js_update">Update chart</span>


    <button type="button" id="button">Click Toast</button>
</div>


 <!-- @foreach($data as $item)   
    $key .= $item->id.',';
    $info .= $item->book_price.',';
 @endforeach -->
<?php 
    $key = "";
    $info = "";
    foreach ($data as $item) {
        $key .= $item->id.',';
        $info .= $item->book_price.',';
    }

    // echo "Key: ".$key.'<hr>';
    // echo "Info: ".$info;
  ?>


<script type="text/javascript">

    window.onload = function () {
        Chart.defaults.global.defaultFontColor = '#000000';
        Chart.defaults.global.defaultFontFamily = 'Arial';
        var lineChart = document.getElementById('line-chart');

        var myChart = new Chart(lineChart, {
            type: 'bar',
            data: {
                labels: [{{$key}}],//["Jan", "Feb", "Mar", "Apr", "May", "June","July","August","September"],
                datasets: [
                    {
                        label: 'Book price',
                        data: [{{$info}}],//[1, 2, 3, 4, 5, 6, 7, 8, 9],
                        backgroundColor: 'rgba(0, 128, 128, 0.3)',
                        borderColor: 'rgba(0, 128, 128, 0.7)',
                        borderWidth: 1
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

    $('#button').on('click',function(){
        toastr.options = {
         "closeButton": true,
          "debug": false,
          "newestOnTop": true,
          "progressBar": false,
          "positionClass": "toast-top-right",
          "preventDuplicates": false,
          // "onclick": function(){
          //   alert("Con Kờ!");
          // },
          "onclick":null,
          "showDuration": "300",
          "hideDuration": "1000",
          "timeOut": "0",
          "extendedTimeOut": "0",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut",
          "tapToDismiss": false
        }

        toastr["success"]("My name is Dylan<br /><br /><button type='button' class='btn clear'>Yes</button>", "Dylan")


    });
    
</script>