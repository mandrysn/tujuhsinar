@extends('layout.layout')
@section('title', 'Tambah Data Order')
@section('content')
<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
<div class="row">
    <div class="col-md-12 col-lg-12">
        @if(Session::has('alert-success'))
            <div class="foxlabel-alert foxlabel-alert-icon alert3"> <i class="fa fa-check"></i> <a href="#" class="closed">&times;</a> {{ \Illuminate\Support\Facades\Session::get('alert-success') }}</div>
        @endif
        <div class="widget-box">
                        
            <div class="widget-title"> <a href="#" data-toggle="modal" data-target="#tambah" class="btn btn-default"><i class="fa fa-plus-circle"></i>Tambah Costumer</a>
                    
            </div>
            <div role="tabpanel"> 
                <br>
                <!-- Nav tabs -->
                <ul class="nav nav-pills" role="tablist">
                    <li class="nav-item"><a class="btn btn-default" href="#outdoor" aria-controls="outdoor" role="tab" data-toggle="tab">Outdoor</a></li>
                    <li class="nav-item"><a class="btn btn-default" href="#indoor" aria-controls="indoor" role="tab" data-toggle="tab">Indoor</a></li>
                    <li class="nav-item"><a class="btn btn-default" href="#merchant" aria-controls="merchant" role="tab" data-toggle="tab">Merchandise</a></li>
                    <li class="nav-item"><a class="btn btn-default" href="#a3" aria-controls="a3" role="tab" data-toggle="tab">Print A3</a></li>
                    <li class="nav-item"><a class="btn btn-default" href="#costum" aria-controls="costum" role="tab" data-toggle="tab">Costum</a></li>
                </ul>
            </div>
        </div>

        <div class="widget-box">
            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane" id="outdoor">
                    @include('transaksi.order.produk.outdoor')
                </div>
                <div role="tabpanel" class="tab-pane" id="indoor">
                    @include('transaksi.order.produk.indoor')
                </div>
                <div role="tabpanel" class="tab-pane" id="merchant">
                    @include('transaksi.order.produk.merchant')
                </div>
                <div role="tabpanel" class="tab-pane" id="a3">
                    @include('transaksi.order.produk.a3')
                </div>
                <div role="tabpanel" class="tab-pane" id="costum">
                    @include('transaksi.order.produk.costum')
                </div>
            </div>
        </div>

        

    </div>
</div>


@push('style')
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
                                                        
                                                        <a href="#" class="btn btn-primary memilih" data-nama="{{ $datanya->nama }}" data-member="{{ $datanya->member->nm_tipe }}" data-id="{{ $datanya->id }}" data-memberid="{{ $datanya->member_id }}"><i class="fa fa-info memilih"></i>Pilih</a>
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
            jQuery('#pilih-pelanggan').modal('hide');

            var id = jQuery(this).data('memberid');
        
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
                            
                            tablaDatos.append("<option class='editorOutdoor' data-type='"+value.type+"' data-nama='"+value.nama_finishing+"' data-target='#pcs' data-pid='"+value.id+"' data-harga='"+value.tambahan_harga+"' value='"+value.id+"'>"+value.nama_finishing+" - ["+value.tambahan_harga+"]</option>").selectpicker('refresh');
                        });
                    
                }
            });
        });

      
    </script>
@endpush

@include('master.pelanggan.modal')
@endsection