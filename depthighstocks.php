<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="jscss/Chart.min.js"></script>
  <link rel="stylesheet" href="jscss/bootstrap.min.css">
  <title>My Chart.js Chart</title>
</head>
<body>
  <?php 
    ob_start();
    session_start();

    date_default_timezone_set("Asia/Manila");

    include 'inventoryconfig.php';

    if(!isset($_SESSION['name'])){
        header("Location: index.php");
      }

    ?>
  <div class="container">
    <canvas id="myChart"></canvas>
  </div>
  
  <script>
    let myChart = document.getElementById('myChart').getContext('2d');

    // Global Options
    Chart.defaults.global.defaultFontFamily = 'Lato';
    Chart.defaults.global.defaultFontSize = 18;
    Chart.defaults.global.defaultFontColor = '#777';

    let massPopChart = new Chart(myChart, {
      type:'horizontalBar', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
      data:{
        labels:[<?php 
        $getsuppliesloc = mysqli_query($conn, "SELECT DISTINCT location FROM supplies");
        while($getsupplieslocrow = mysqli_fetch_array($getsuppliesloc)){
          $string = $getsupplieslocrow['location'];
          echo "'".$string."' ,";
         
          } 
        ?>],
        //?>', 'Worcester', 'Springfield', 'Lowell', 'Cambridge', 'New Bedford'],
        datasets:[{
          label:'Stock Levels',
          data:[
            //617594,181045,153060,106519,105162,95072
            
            <?php
                $getloc = mysqli_query($conn, "SELECT DISTINCT location FROM supplies");
                while($getlocrow = mysqli_fetch_array($getloc)){
                  $location = $getlocrow['location'];
                  $getquan = mysqli_query($conn, "SELECT quantity FROM supplies WHERE location = '$location'");
                  $quanarr = array();
                  $x = 0;
                  while($getquanrow = mysqli_fetch_array($getquan)){
                     $quanarr[$x] = $getquanrow['quantity'];
                     $x++;
                    }

                  $sum = array_sum($quanarr);
                  echo $sum.",";
                  }              
            ?>
            

          ],
          //backgroundColor:'green',
          backgroundColor:[
            'rgba(255, 99, 132, 0.6)',
            'rgba(54, 162, 235, 0.6)',
            'rgba(255, 206, 86, 0.6)',
            'rgba(75, 192, 192, 0.6)',
            'rgba(153, 102, 255, 0.6)',
            'rgba(255, 159, 64, 0.6)',
            'rgba(255, 99, 132, 0.6)'
          ],
          borderWidth:1,
          borderColor:'#777',
          hoverBorderWidth:3,
          hoverBorderColor:'#000'
        }]
      },
      options:{
        title:{
          display:true,
          text:'Outstanding Department Stock Levels of Supplies',
          fontSize:25
        },
        legend:{
          display:true,
          position:'right',
          labels:{
            fontColor:'#000'
          }
        },
        layout:{
          padding:{
            left:50,
            right:0,
            bottom:0,
            top:0
          }
        },
        tooltips:{
          enabled:true
        }
      }
    });
  </script>
</body>
</html>
