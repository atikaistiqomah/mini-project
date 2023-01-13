<?php
include("query.php");
?>
<head>
    <title>mini-project</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-inverse">
        <ul class="nav navbar-nav">
            <li><a href="#">Tabel</a></li>
            <li><a href="#">Grafik pie dan tabel</a></li>
            <li><a href="#">Grafik bar</a></li>
        </ul>
    </nav>

    <!-- tabel -->
    
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                  <th>No</th>
                  <th>Delivery Channel</th>
                  <th>Frekuensi Trx Sukses</th>
                  <th>Frekuensi Trx Gagal</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <!-- grafik pie dan keterangan -->
    <div class = "container">
        <div class="row">
            <div class="col-sm-6" style="background-color:yellow;">
                <p>Sed ut perspiciatis...</p>
            </div>
            <div class="col-sm-6" style="background-color:pink;">
                <p>Sed ut perspiciatis...</p>
            </div>
        </div>
    </div>

    <!-- grafik bar dan tabel -->
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                  <th>No</th>
                  <th>Merchant City</th>
                  <th>Frekuensi Trx Sukses</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class = "container">
        <div class="row" style="background-color:red;">
            <p>Sed ut perspiciatis...</p>
        </div>
    </div>


    <div class="container box">
        <h3 align="center">
            Geeks for Geeks Import JSON 
            data into database
        </h3><br />
          
        <?php
          
            // Server name => localhost
            // Username => root
            // Password => empty
            // Database name => test
            // Passing these 4 parameters
            $connect = mysqli_connect("localhost", "root", "", "mini-project"); 
              
            $query = '';
            $table_data = '';
            
            
            
            // Extracting row by row
            foreach($array as $row) {
  
                // Database query to insert data 
                // into database Make Multiple 
                // Insert Query 
                $query .= 
                
                $table_data .= '
                <tr>
                    <td>'.$row["delivery_channel"].'</td>
                    <td>'.$row["trx_status"].'</td>
                    <td>'.$row["amount"].'</td>
                </tr>
                '; // Data for display on Web page
            }
  
            if(mysqli_multi_query($connect, $query)) {
                echo '<h3>Inserted JSON Data</h3><br />';
                echo '
                <table class="table table-bordered">
                <tr>
                    <th width="45%">delivery channel</th>
                    <th width="10%">trx status</th>
                    <th width="45%">amount</th>
                </tr>
                ';
                echo $table_data;  
                echo '</table>';
            }
          ?>
        <br />
    </div>


</body>

