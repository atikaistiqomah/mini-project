<?php
include('query.php');
?>
<head>
    <title>mini-project</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.1.2/chart.min.js" integrity="sha512-fYE9wAJg2PYbpJPxyGcuzDSiMuWJiw58rKa9MWQICkAqEO+xeJ5hg5qPihF8kqa7tbgJxsmgY0Yp51+IMrSEVg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-inverse">
        <ul class="nav navbar-nav">
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
    
    <!-- pie dan keterangan -->
    
    <table class="table table-bordered mx-auto">
        <thead>
            <tr>
            <th>No</th>
            <th>Delivery Channel</th>
            <th>Amount</th>
            </tr>
        </thead>
        <tbody>
        <?php

            if(is_array($fetch3)) {
                $sn3 = 1;
                foreach ($fetch3 as $data3) {
            ?>
            <tr>
                <td><?php echo $sn3;?></td>
                <td><?php echo $data3['delivery_channel'];?></td>
                <td>Rp<?php echo number_format($data3['total_amount']);?></td>
            </tr>
            <?php
            $sn3++;}
            } else{
            ?>
            <tr>
                <td colspan="8">
                    <?php echo $fetch3;?>
                </td>
            </tr>
            <?php } 
            ?>
        </tbody>
    </table>


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
            <?php
                if(is_array($fetch2)) {
                    $sn2 = 1;
                    foreach ($fetch2 as $data2) {
                ?>
                <tr>
                    <td><?php echo $sn2;?></td>
                    <td><?php echo $data2['city'];?></td>
                    <td><?php echo $data2['trx_success'];?></td>
                </tr>
                <?php
                $sn2++;}
                } else{
                ?>
                <tr>
                    <td colspan="8">
                        <?php echo $fetch2;?>
                    </td>
                </tr>
                <?php } 
                ?>
            </tbody>
        </table>
    </div>

</body>

