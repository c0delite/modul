   <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
   
            <!-- page title area end -->
            <div class="main-content-inner">  
                <hr>
                <?php foreach ($data as $d) {?>             
                <h5>Selamat datang <?php echo $nama ?></h5>
                <br>
                <!-- profilestart-->
                <div class="row">
                <div class="col-md-5">
                    <h6>Profile</h6>
                    <br>
                    <table class="table text-left">
                        <tr>
                            <td>Nama Lengkap</td>
                            <td><?php echo $d->namaLengkap; ?></td>
                        </tr>
                        <tr>
                            <td>No Ktp</td>
                            <td><?php echo $d->noktp; ?></td>
                        </tr>
                        <tr>
                            <td>Agama</td>
                            <td><?php echo $d->agama; ?></td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td><?php echo $d->kelamin; ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal lahir</td>
                            <td><?php echo $d->tglLahir; ?></td>
                        </tr>
                    </table>                
                </div>

                    <br>
                <div class="col-md-5">
                    <h6>Unit</h6>
                    <br>
                    <table class="table text-left">
                        <tr>
                            <td>Nomor unit</td>
                            <td><?php echo $d->noUnit; ?></td>
                        </tr>
                        <tr>
                            <td>Tower</td>
                            <td><?php echo $d->namaTower; ?></td>
                        </tr>
                    </table>                
                </div>

                    <div class="col-md-5">
                    <h6>Contact Person</h6>
                    <br>
                    <table class="table text-left">
                        <tr>
                            <td>No tlp</td>
                            <td><?php echo $d->notlp; ?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><?php echo $d->email; ?></td>
                        </tr>
                    </table>                
                </div>

                </div>
                <!-- profileend-->
                </div><?php }?>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <footer>
            <div class="footer-area">
                <p>© Copyright 2018. All right reserved. Template by <a href="https://colorlib.com/wp/">Colorlib</a>.</p>
            </div>
        </footer>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
