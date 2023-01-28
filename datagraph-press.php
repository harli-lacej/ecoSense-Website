<!--The page on which the air pressure data will be presented graphically.-->
<!--Project:ecoSense - Website-->
<!--Author:Harli Laçej-->
<!--Date: 28/01/2023-->
<!DOCTYPE html>
<html lang="en">

<head>
  <!--Setting the title, meta data and linking to external CSS or importing JavaScript 
  libraries,Bulma or Google Fonts-->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="refresh" content="20">
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4"></script>
  <link rel="stylesheet" href="datagraph.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
  <link href='https://fonts.googleapis.com/css?family=Nunito' rel='stylesheet'>
  <link rel="icon" href="images/ecosense_logo.png" type="image/x-icon">
  <script src="../js-simple-loader-main/loader.js"></script>
  <link rel="stylesheet" href=".../js-simple-loader-main/index.main" />

  <title>Pressure & Humidity | Chart</title>
</head>

<body>
  <!--In the body, there is a navigation bar, realized through Bulma, and then there 
  is also the space where the graphics are presented.-->
  <nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
      <a class="navbar-item">
        <img src="logo-green.png" style="max-height:40px ;">
      </a>

      <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
      </a>
    </div>

    <div id="navbarBasicExample" class="navbar-menu">
      <div class="navbar-start">
        <a class="navbar-item">
          Humidity and air pressure
           data visualization
        </a>
        <div class="navbar-item has-dropdown is-hoverable">
          <a class="navbar-link">
            Filter data
          </a>

          <div class="navbar-dropdown">
            <a class="navbar-item" id="nav-today" onclick="myFunction()">
              Air pressure
            </a>
            <a class="navbar-item" id="nav-last" onclick="myFunction2()">
              Humidity
            </a>
          </div>
        </div>
      </div>

      <div class="navbar-end">
        <div class="navbar-item">
          <div class="buttons">
            <a href="dashboard.php" class="button is-primary">
              <strong>Dashboard</strong>
            </a>
          </div>
        </div>
      </div>
    </div>
  </nav>
  <script>
  /*The creation of three simple functions, so that if we click on one of the Dropdown elements of the page,
    they will send another page with other graphics.*/
    function myFunction() {
      window.location.replace("datagraph-press.php");
    }

    function myFunction2() {
      window.location.replace("datagraph-hum.php");
    }
  </script>


 <?php
  //Creating the connection between the page and the database to receive the data, with the purpose of creating the graph
  //saving the data for database connection in variables
  $servername = "htl-projekt.com";
  $username   = "harlilacej";
  $pass   = "!Insy_2021$";
  $dbname     = "2023_EcoSense_DA";
  //connecting through MSQLi
  $conn = new mysqli($servername, $username, $pass, $dbname);
  $query = $conn->query("select time,pressure from Pressure_Humidity limit 15");
  //recieving data from sensor and saving data in an array
  foreach ($query as $data) {
    $pressure[] = $data['pressure'];
    $time[] = $data['time'];
  }
  ?>
  <!--A div where the chart will be placed-->
  <div class="div-chart">
    <canvas id="myChart"></canvas>
  </div>

  <script>
    //Chart creation and configuration.
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: <?php echo json_encode($time) ?>,
        datasets: [{
            label: 'Air pressure (in hPa)',
            backgroundColor: 'rgb(171, 201, 100,0.1)',
            borderColor: 'rgb(171, 201, 100)',
            data: <?php echo json_encode($pressure) ?>,
            pointStyle: 'circle',
            pointRadius: 5,
            pointHoverRadius: 10
          }
        ]
      },
      options: {
        legend: {
          labels: {
            fontColor: "white",
            fontSize: 12,
            fontFamily: "Nunito",
          }
        },
        scales: {
          yAxes: [{
            ticks: {
              fontColor: "white",
              fontSize: 10,
              fontFamily: "Nunito"
            }
          }],
          xAxes: [{
            ticks: {
              fontColor: "white",
              fontSize: 9,
              fontFamily: "Nunito",
              maxRotation: 30,
              minRotation: 30
            }
          }]
        }
      }

    });
  </script>

</body>

</html>