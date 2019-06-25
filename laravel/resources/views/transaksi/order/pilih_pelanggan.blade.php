<div class="modal fade bs-example" id="pilih-pelanggan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pilih Pelanggan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            
                            <!-- Start Panel -->
                            <div class="col-md-12">
                       
                                <div class="panel panel-default">
                                   
                                    <div class="panel-body table-responsive">
                                        <table id="example0" class="table display">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>ID Costumer</th>
                                                <th>Nama</th>
                                             
                                                <th>Tipe Member</th>
                                              
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($members as $index => $datanya)
                                                @php($id_pelanggan = $datanya->id)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ sprintf("%06s", $datanya->id) }}</td>
                                                    <td>{{ $datanya->nama }}</td>
                                               
                                                    <td>{{ $datanya->member->nm_tipe }}</td>
                                                  
                                                    <td>
                                                        
                                                        <a href="#" class="btn btn-primary memilih" data-nama="{{ $datanya->nama }}" data-member="{{ $datanya->member->nm_tipe }}" data-id="{{ $datanya->id }}" data-memberid="{{ $datanya->member_id }}" data-dismiss="modal"><i class="fa fa-info memilih"></i>Pilih</a>
                                                    </td>
                                                </tr>
                                                @empty
                                            @endforelse
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
        function jsUcfirst(string) 
        {
            return string.charAt(0).toUpperCase() + string.slice(1);
        }
        var produk = "indoor";
        jQuery('.tombol-pilih').on('click', function(e){
            produk = jQuery(this).data('produk');
        });

        jQuery('.memilih').on('click', function(e){
            
            jQuery('#detail-pelanggan-'+produk).val(jQuery(this).data('nama')+'('+jQuery(this).data('member')+')');
            jQuery('#pelanggan_'+produk).val(jQuery(this).data('id'));
            //jQuery('#pilih-pelanggan').modal('hide');

            // $('body').removeClass('modal-open');
            // $('.modal-backdrop').remove();
            var id = jQuery(this).data('memberid');
        
            

            jQuery.ajax({
                type     : 'get',
                url      : "{{ url('admin/transaksi/order/outdoor/finishing') }}",
                data     : {id:id},
                typeData : 'json',
                success:function(data)
                {
                    console.log(data)
                    jQuery('.editor'+jsUcfirst(produk)).remove();
                    var tablaDatos = jQuery('#editor_'+produk);
                    
                    jQuery(data).each(function(key,value){
                            
                            tablaDatos.append("<option class='editor"+jsUcfirst(produk)+"' data-type='"+value.type+"' data-nama='"+value.nama_finishing+"' data-target='#pcs-"+produk+"' data-pid='"+value.id+"' data-harga='"+value.tambahan_harga+"' value='"+value.id+"'>"+value.nama_finishing+" - ["+value.tambahan_harga+"]</option>").selectpicker('refresh');
                        });
                    
                }
            });

            jQuery.ajax({
                type     : 'get',
                url      : "{{ url('admin/transaksi/order/outdoor/kaki') }}",
                data     : {id:id},
                typeData : 'json',
                success:function(data)
                {
                    //console.log(data)
                    jQuery('.'+produk+'Kaki').remove();
                    var tablaDatos = jQuery('#kaki_'+produk);
                    
                    jQuery(data).each(function(key,value){
                            tablaDatos.append("<option class='"+produk+"Kaki' data-pid='"+value.id+"' data-harga='"+value.tambahan_harga+"' value='"+value.id+"'>"+value.nama_kaki+" - ["+value.tambahan_harga+"]</option>").selectpicker('refresh');
                        });
                    
                }
            });
        });

      
    </script>
@endpush