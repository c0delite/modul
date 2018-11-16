
<div class="main-content-inner"> 
    <hr>
    
<br>
<!-- data table start -->
<div class="col-12 mt-5">
<div class="data-tables">
  <table id="dataTable" class="display text-center">
    <thead>
    <tr>
    <th>id komplain</th>
    <th>tanggal komplain</th>
    <th>kategori</th>
    <th>tanggal update</th>
    <th>teknisi</th>
    <th>Action</th>
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
        <td><i class="ti-printer"> Print</i></td>
      </tr>
<?php } ?>
    </tbody>
  </table>
</div>
</div>
    </div>
