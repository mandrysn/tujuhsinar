<div class="modal fade bs-example" id="pilih-member" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pilih Pelanggan</h5>
                        <button type="button" class="btn btn-info" onclick="load_data('refresh')" style="margin-top: 10px;margin-left: 20px;">Reload</button>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            
                            <!-- Start Panel -->
                            <div class="col-md-12">
                       
                                <div class="panel panel-default">
                                   
                                    <div class="panel-body table-responsive" style="max-height: 80vh;overflow-y: scroll;width: 100%;">
                                        <table id="table-pilih-member" class="table display">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                
                                                <th>Keterangan</th>
                                              
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody id="list-member">
                                            
                                        </tbody>
                                        <tfoot>

                                        </tfoot>
                                    </table>
                                    </div>
                                </div>
                            </div>
                            <!-- End Panel --> 
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @push('style')

    <script type="text/javascript">
        var table = null;
        var cur_edit_id = 0;
        var edit_modal = false;
        jQuery(document).on('click','#tombol-pilih-member',function () {
           cur_edit_id = 0;
           edit_modal = false;
            load_data();
                
            
        });
        
        jQuery(document).on('click','.tombol-pilih-member-edit',function () {
           cur_edit_id = jQuery(this).data('id');
           edit_modal = true;
            load_data();
                
            
        });

        function load_data(aksi = null) {
            if (!jQuery.fn.DataTable.isDataTable( '#table-pilih-member' ) ) {
                table = jQuery('#table-pilih-member').DataTable( {
                  "ajax": {
                    "url": "{{ url('api/data_member') }}",
                    "type": "GET"
                  }
                });
            }
            if(aksi == "refresh"){
                table.ajax.reload();
            }
        }
        
       

        jQuery(document).on('click','.memilih', function(e){
            if(!edit_modal){
                jQuery('#detail-member').val(jQuery(this).data('nama'));
                jQuery('#member-id').val(jQuery(this).data('id'));
                jQuery('#pilih-member').modal('hide');
            } else {
                jQuery('#detail-member-'+cur_edit_id).val(jQuery(this).data('nama'));
                jQuery('#member-id-'+cur_edit_id).val(jQuery(this).data('id'));
                jQuery('#pilih-member').modal('hide');
            }
                

            
        });
            

      
    </script>
@endpush