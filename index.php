<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/favicon.png" type="">

  <title> Monitoring Tambak </title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- Fonts style -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

  <!-- Owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- Font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- Responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

  <style>
    table {
      width: 100%;
      border-collapse: collapse;
      margin: 20px 0;
      font-size: 18px;
      text-align: left;
    }

    table, th, td {
      border: 1px solid #ddd;
    }

    th, td {
      padding: 12px;
    }

    th {
      background-color: #010d85;
      color: #ffffff;
    }

    tr:nth-child(even) {
      background-color: #f9f9f9;
    }

    tr:hover {
      background-color: #f1f1f1;
    }
  </style>
</head>

<body>

  <div class="hero_area">

    <div class="hero_bg_box">
      <div class="bg_img_box">
        <img src="images/hero-bg.png" alt="">
      </div>
    </div>

    <!-- Slider section -->
    <section class="slider_section ">
      <div id="customCarousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container ">
              <div class="row">
                <div class="col-md-6 ">
                  <div class="detail-box">
                    <h1>
                      SISTEM MONITORING TAMBAK
                    </h1>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="img-box">
                    <img src="images/slider-img.png" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End slider section -->
  </div>

  <div class="container mt-5">
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hehe";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT id, suhu, keruh, ph, tds, reading_time FROM sensordata ORDER BY id DESC"; /*select items to display from the sensordata table in the data base*/

    echo '<table class="table table-striped table-bordered">
          <thead>
            <tr> 
              <th>ID</th> 
              <th>Date / Time</th> 
              <th>Suhu (°C)</th> 
              <th>Kekeruhan</th>  
              <th>pH</th> 
              <th>Salinitas (ppm)</th>   
            </tr>
          </thead>
          <tbody>';
     
    if ($result = $conn->query($sql)) {
        while ($row = $result->fetch_assoc()) {
            $row_id = $row["id"];
            $row_reading_time = $row["reading_time"];
            $row_suhu = $row["suhu"];
            $row_keruh = $row["keruh"];
            $row_ph = $row["ph"];
            $row_tds = $row["tds"];
            
            // Uncomment to set timezone to - 1 hour (you can change 1 to any number)
            // $row_reading_time = date("Y-m-d H:i:s", strtotime("$row_reading_time - 1 hours"));
          
            // Uncomment to set timezone to + 4 hours (you can change 4 to any number)
            // $row_reading_time = date("Y-m-d H:i:s", strtotime("$row_reading_time + 4 hours"));
          
            echo '<tr> 
                    <td>' . $row_id . '</td> 
                    <td>' . $row_reading_time . '</td> 
                    <td>' . $row_suhu . '</td> 
                    <td>' . $row_keruh . '</td> 
                    <td>' . $row_ph . '</td> 
                    <td>' . $row_tds . '</td> 
                  </tr>';
        }
        $result->free();
    }

    $conn->close();
    ?> 
    </tbody>
    </table>
  </div>

  <!-- jQuery -->
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <!-- Popper JS -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- Bootstrap JS -->
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <!-- Owl slider -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <!-- Custom JS -->
  <script type="text/javascript" src="js/custom.js"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
  </script>
  <!-- Refresh script -->
  <script type="text/javascript">
    setTimeout(function(){
      location.reload();
    }, 60000); // 9 minutes in milliseconds
  </script>

</body>

</html>
