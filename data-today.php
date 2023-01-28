<!--The page on which the temperature data will be presented graphically.-->
<!--NOTICE:Dublicate of "datagraph.php" with changed graph content(SQL-Query changed)-->
<!--Project:ecoSense - Website-->
<!--Author:Harli Laçej-->
<!--Date: 26/10/2022-->
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

  <title>Temperature | Chart</title>
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
          Temperature data visualization
        </a>
        <div class="navbar-item has-dropdown is-hoverable">
          <a class="navbar-link">
            Filter data
          </a>

          <div class="navbar-dropdown">
            <a class="navbar-item" id="nav-today" onclick="myFunction()">
              Today
            </a>
            <a class="navbar-item" id="nav-last" onclick="myFunction2()">
              Last records
            </a>
            <a class="navbar-item" id="nav-all" onclick="myFunction3()">
              All
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
      window.location.replace("data-today.php");
    }

    function myFunction2() {
      window.location.replace("datagraph.php");
    }

    function myFunction3() {
      window.location.replace("data-all.php");
    }
  </script>

  <?php
  //Creating the connection between the page and the database to receive the data, with the purpose of creating the graph
  //saving the data for database connection in variables
  error_reporting(E_ALL ^ E_NOTICE);
  $servername = "htl-projekt.com";
  $username   = "harlilacej";
  $pass   = "!Insy_2021$";
  $dbname     = "2023_EcoSense_DA";
  //connecting through MSQLi
  $conn       = new mysqli($servername, $username, $pass, $dbname);
  $query = $conn->query("select temperature,time,deviceID from Temperatur where deviceID=1 and date(time) = curdate() limit 20");
  //recieving data from sensor with the ID 1 and saving data in an array(no limit set)
  foreach ($query as $data) {
    $temperature[] = $data['temperature'];
    $time[] = $data['time'];
  }
  //recieving data from sensor with the ID 2 and saving data in an array(no limit set)
  $query = $conn->query("select temperature,time,deviceID from Temperatur where deviceID=2 and date(time) = curdate() limit 20");
  foreach ($query as $data) {
    $temperature2[] = $data['temperature'];
  }
  if ($result->num_rows <= 0) {
    echo "<div class='is-align-items-center is-flex'>";

    echo "<h1 style='margin-left:42%; font-size: 20px;margin-top:5%' class='title has-text-grey-light is-size-4'>No Measurements today!🙁</h1>";
    echo "</div>";
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
            label: 'DeviceID 1',
            backgroundColor: 'rgb(171, 201, 100,0.1)',
            borderColor: 'rgb(171, 201, 100)',
            data: <?php echo json_encode($temperature) ?>,
            pointStyle: 'circle',
            pointRadius: 5,
            pointHoverRadius: 10
          },
          {
            label: 'DeviceID 2',
            backgroundColor: 'rgb(230, 115, 107,0.1)',
            borderColor: 'rgb(230, 115, 107)',
            data: <?php echo json_encode($temperature2) ?>,
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