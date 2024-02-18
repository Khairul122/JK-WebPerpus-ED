<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 style="font-family: 'Quicksand', sans-serif; font-weight: bold;">
            Dashboard
            <small>
                <script type='text/javascript'>
                    var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                    var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
                    var date = new Date();
                    var day = date.getDate();
                    var month = date.getMonth();
                    var thisDay = date.getDay(),
                        thisDay = myDays[thisDay];
                    var yy = date.getYear();
                    var year = (yy < 1000) ? yy + 1900 : yy;
                    document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);
                    //
                </script>
            </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="../../assets/#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <?php
date_default_timezone_set('Asia/Jakarta');
$jam = date("H:i");

// atur salam dengan IF
if ($jam > '05:30' && $jam < '10:00') {
    $salam = 'Pagi';
} elseif ($jam >= '10:00' && $jam < '15:00') {
    $salam = 'Siang';
} elseif ($jam < '18:00') {
    $salam = 'Sore';
} else {
    $salam = 'Malam';
}
?>
        <?php
include "../../config/koneksi.php";

$sql = mysqli_query($koneksi, "SELECT * FROM identitas");
$row1 = mysqli_fetch_assoc($sql);
?>
        <div class="alert alert-secondary" style="color: #383d41; background-color: #e2e3e5; border-color: #d6d8db;">
            Selamat <?=$salam;?>, Selamat datang <b><?=$_SESSION['fullname'];?></b> di <?=$row1['nama_app'];?>.
        </div>
        <!-- -->
        <?php
include "../../config/koneksi.php";
$query = mysqli_query($koneksi, "SELECT * FROM identitas");
$row = mysqli_fetch_assoc($query);

?>

<div class="box-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul Buku</th>
                                    <th>Pengarang</th>
                                    <th>Penerbit</th>

                                    <th>Jumlah Buku</th>

                                </tr>
                            </thead>
                            <?php
include "../../config/koneksi.php";

$no = 1;
$query = mysqli_query($koneksi, "SELECT * FROM buku");
while ($row = mysqli_fetch_assoc($query)) {
    ?>
                                <tbody>
                                    <tr>
                                        <td><?=$no++;?></td>
                                        <td><?=$row['judul_buku'];?></td>
                                        <td><?=$row['pengarang'];?></td>
                                        <td><?=$row['penerbit_buku'];?></td>
                                        <td><?=$row['j_buku_baik'];?></td>
                                    </tr>
                                </tbody>
                            <?php
}
?>
                        </table>
                    </div>
    </section>
    <!-- /.content -->
</div>
