<div class="main-content-inner"> 
    <hr>
<h5>Buat Complain</h5>
<br>
<!-- data table start -->
<div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Complain history</h4>
                                <div class="data-tables">
                                    <table id="dataTable" class="text-center">
                                        <thead class="bg-light text-capitalize">
                                            <tr>
                                                <th>id komplain</th>
                                                <th>tanggal komplain</th>
                                                <th>kategori</th>
                                                <th>tanggal update</th>
                                                <th>teknisi</th>
                                                <th>status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($data as $d) {?>    
                                            <tr>
                                                <td><?php echo $d->idKomplain; ?></td>
                                                <td><?php echo $d->tglKomplain; ?></td>
                                                <td><?php echo $d->katKomplain; ?></td>
                                                <td><?php echo $d->tglUpdate; ?></td>
                                                <td><?php echo $d->teknisi; ?></td>
                                                <td><?php echo $d->status; ?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- data table end -->
</div>