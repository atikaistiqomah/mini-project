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
                <?php
                if(is_array($fetch)) {
                    $sn = 1;
                    foreach ($fetch as $data) {
                ?>
                <tr>
                    <td><?php echo $sn;?></td>
                    <td><?php echo $data['delivery_channel'];?></td>
                    <td><?php echo $data['trx_success'];?></td>
                    <td><?php echo $data['trx_failed'];?></td>
                </tr>
                <?php
                $sn++;}
                } else{
                ?>
                <tr>
                    <td colspan="8">
                        <?php echo $fetch;?>
                    </td>
                </tr>
                <?php } 
                ?>
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

</body>

