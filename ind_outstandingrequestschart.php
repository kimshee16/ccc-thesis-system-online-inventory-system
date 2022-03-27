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
    $conn = mysqli_connect("localhost", "root", "", "ccc_inventorysystem");

    if(!$conn){
      die("Connection failed: " .mysqli_connect_error());
    }

    $year = $_POST['year'];

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
      type:'line', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
      data:{
        labels:[<?php 
        $getborrowernames = mysqli_query($conn, "SELECT name FROM personincharge");
        while($getborrowernamesrow = mysqli_fetch_array($getborrowernames)){
          echo "'".$getborrowernamesrow['name']."' ,";
         
          } 
        ?>],
        //?>', 'Worcester', 'Springfield', 'Lowell', 'Cambridge', 'New Bedford'],
        datasets:[{
          label:'Number of request',
          data:[
            //617594,181045,153060,106519,105162
            
            
            <?php
             $getname = mysqli_query($conn, "SELECT name FROM personincharge");
              
              while($getnamerow = mysqli_fetch_array($getname)){
                   $beg = $year."-01-01"; 
                   $end = $year."-12-31";
                   $personname = $getnamerow['name'];
                   $getquantot = mysqli_query($conn, "SELECT quantity FROM borrowitem WHERE personincharge = '$personname' AND daterequested BETWEEN '$beg' AND '$end'");
                   $x = 0;
                  $rowquantities = array();                   
                   
                   while($getquantotrow = mysqli_fetch_array($getquantot)){
                        $rowquantities[$x] = $getquantotrow['quantity'];
                        $x++;
                      }
                    
                    $totalquantity = array_sum($rowquantities);
                   
                    echo $totalquantity.",";
                   }



            ?>


            

            //<?php
            //    $getsuppliesquan = mysqli_query($conn, "SELECT quantity FROM supplies");
            //    while($getsuppliesquanrow = mysqli_fetch_array($getsuppliesquan)){
            //      echo $getsuppliesquanrow['quantity'].",";
            //      }             
            //?>
              

          ],
          //backgroundColor:'green',
          backgroundColor:[
            'rgba(255, 99, 132, 0.6)'
            ,
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
          text:'Outstanding Equipment Request per Individual <?php echo "- ".$year;?>',
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
