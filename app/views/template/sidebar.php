<!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
<!--sidebar start-->
<?php 
  $id = $_SESSION['admin']['id_member'];
  $hasil_profil = $lihat -> member_edit($id);
?>
<link rel="stylesheet" href="../styles.css">
<aside>
    <div id="sidebar" class="brand">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">

            <li class="brand">
                <a href="index.php">
                    <i class="fa fa-dashboard"></i>
                    <span>Home</span>
                </a>
            </li>
            <?php
                  ?>
            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-bar-chart"></i>
                    <span>Barang <span style="padding-left:2px;"> <i class="fa fa-angle-down"></i></span></span>
                </a>

                <ul class="sub">
                    <li><a href="index.php?page=barang">Barang</a></li>
                    <li><a href="index.php?page=kategori">Kategori</a></li>
                    <li><a href="index.php?page=supplier">Data Supplier</a></li>
                </ul>

            </li>

            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="glaphycon glaphycon-log-in"></i>
                    <span>Transaksi <span style="padding-left:2px;"> <i class="fa fa-angle-down"></i></span></span>
                </a>
                <ul class="sub">
                    <li><a href="index.php?page=inputBarang">Input Barang</a></li>
                    <li><a href="index.php?page=jual">Pembayaran</a></li>
                </ul>
            </li>
            <li class="brand">
                <a href="index.php?page=laporan">
                    <i class="fa fa-dashboard"></i>
                    <span>Laporan</span>
                </a>
            </li>

            <li class="brand">
                <a href="index.php?page=pengaturan">
                    <i class="fa fa-dashboard"></i>
                    <span>User</span>
                </a>
            </li>
            <div class="text-center">
                <?php echo date('Y');?> - Sistem Penjualan Barang Berbasis Web
            </div>
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->