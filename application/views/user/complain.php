<div class="main-content-inner"> 
    <hr>
<h5>Buat Complain</h5>
<br>
<!-- data table start -->
<div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Complain history</h4>
                            <div class="col-md-6"><a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#ModalaAdd"><span class="fa fa-plus"></span> Buat Komplain</a></div>
                                <br />
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
                    <!-- MODAL ADD -->
        <div class="modal fade" id="ModalaAdd" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h3 class="modal-title" id="myModalLabel">Buat Komplain</h3>
            </div>
            <form class="form-horizontal">
                <div class="modal-body">
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Kategori</label>
                        <div class="col-xs-9">
                        <?php
                        $id = 'id="kategori"';
                echo form_dropdown('kat', $kategori, $katSelected,$id);
                ?>    
                        </div>
                    </div>
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Detail Komplain</label>
                        <div class="col-xs-9">
                            <textarea name="detail" rows="5" cols="60" id="detail"></textarea>
                        </div>
                    </div>
                </div>
 
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info" id="btn_simpan">Simpan</button>
                </div>
            </form>
            </div>
            </div>
        </div>
        <!--END MODAL ADD-->
</div>

<script type="text/javascript">
    $(document).ready(function(){
        //show_product(); //call function show all product
         

        var table = $('#dataTable').DataTable();
 
        table
        .column( '1:visible' )
        .order( 'desc' )
        .draw();
        
        // function show_product(){
        //     $.ajax({
        //         type  : 'ajax',
        //         url   : '<?php //echo site_url('user/complain')?>',
        //         async : true,
        //         dataType : 'json',
        //         success : function(sql){
        //             var html = '';
        //             var i;
        //             for(i=0; i<sql.length; i++){
        //                 html += '<tr>'+
        //                         '<td>'+sql[i].idKomplain+'</td>'+
        //                         '<td>'+sql[i].product_name+'</td>'+
        //                         '<td>'+sql[i].product_price+'</td>'+
        //                         '<td style="text-align:right;">'+
        //                             '<a href="javascript:void(0);" class="btn btn-info btn-sm item_edit" data-product_code="'+data[i].product_code+'" data-product_name="'+data[i].product_name+'" data-price="'+data[i].product_price+'">Edit</a>'+' '+
        //                             '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-product_code="'+data[i].product_code+'">Delete</a>'+
        //                         '</td>'+
        //                         '</tr>';
        //             }
        //             $('#show_data').html(html);
        //         }
 
        //     });
        // }

        //Save product
        $('#btn_simpan').on('click',function(){
            var kategori = $('#kategori').val();
            var detail = $('#detail').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('user/tambahKomplain')?>",
                dataType : "JSON",
                data : {kategori:kategori , detail:detail},
                success: function(data){
                    $('[name="kat"]').val("");
                    $('[name="detail"]').val("");
                    $('#ModalAdd').modal('hide');
                    }
            });
            return false;
        });
 
        //update record to database
        //  $('#btn_update').on('click',function(){
        //     var product_code = $('#product_code_edit').val();
        //     var product_name = $('#product_name_edit').val();
        //     var price        = $('#price_edit').val();
        //     $.ajax({
        //         type : "POST",
        //         url  : "<?php// echo site_url('product/update')?>",
        //         dataType : "JSON",
        //         data : {product_code:product_code , product_name:product_name, price:price},
        //         success: function(data){
        //             $('[name="product_code_edit"]').val("");
        //             $('[name="product_name_edit"]').val("");
        //             $('[name="price_edit"]').val("");
        //             $('#Modal_Edit').modal('hide');
        //             show_product();
        //         }
        //     });
        //     return false;
        // });
 
        //get data for delete record
        // $('#show_data').on('click','.item_delete',function(){
        //     var product_code = $(this).data('product_code');
             
        //     $('#Modal_Delete').modal('show');
        //     $('[name="product_code_delete"]').val(product_code);
        // });
 
        //delete record to database
        //  $('#btn_delete').on('click',function(){
        //     var product_code = $('#product_code_delete').val();
        //     $.ajax({
        //         type : "POST",
        //         url  : "<?php //echo site_url('product/delete')?>",
        //         dataType : "JSON",
        //         data : {product_code:product_code},
        //         success: function(data){
        //             $('[name="product_code_delete"]').val("");
        //             $('#Modal_Delete').modal('hide');
        //             show_product();
        //         }
        //     });
        //     return false;
        // });
 
    });
 
</script>
