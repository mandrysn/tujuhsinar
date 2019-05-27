@extends('layout.layout')
@section('title', 'Data Ukuran Bahan')
@section('content')

		<div class="row"> 
			<!-- Start Panel -->
			<div class="col-md-12">
				@if(Session::has('alert-ukuran'))
					<div class="foxlabel-alert foxlabel-alert-icon alert3"> <i class="fa fa-check"></i> <a href="#" class="closed">&times;</a> {{ \Illuminate\Support\Facades\Session::get('alert-ukuran') }}</div>
                @endif
				<div class="panel panel-default">
					<a href="#" data-toggle="modal" data-target="#tambah" class="btn btn-default"><i class="fa fa-plus-circle"></i>Tambah Ukuran Bahan</a>
					<br>
					<br>
					<div class="panel-title"> Data Ukuran </div>
					<div class="panel-body table-responsive">
						<table id="example0" class="table display">
							<thead>
								<tr>
									<th>No.</th>
									<th>Tipe Produk</th>
									<th>Ukuran Bahan</th>
									<th>Bahan</th>
									<th>Range Ukuran</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								@forelse($data as $index => $datas)
								<tr>
									<td>{{ $index + 1 }}</td>
									<td>{{ $datas->nama_produk }}</td>
									<td>{{ $datas->nm_ukuran_bahan }}</td>
									<td>{{ $datas->barang->nm_barang }}</td>
									<td>{{ number_format($datas->range_min, 2) }} - {{ number_format($datas->range_max, 2) }}</td>
									<td>
										<form action="{{ route('ukuran-bahan.destroy', $datas->id) }}" method="post">
											{{ csrf_field() }}
											{{ method_field('DELETE') }}
											<button class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ?')"><i class="fa fa-check"></i>Delete</button>
										</form>
										{{-- <button href="#" data-toggle="modal" data-target="#edit-{{ $datas->id }}" class="btn btn-option2"><i class="fa fa-info"></i>Edit</button> --}}
									</td>
								</tr>
								@empty
								@endforelse
							<tfoot>

							</tfoot>
						</table>
					</div>
				</div>
			</div>
			<!-- End Panel --> 
		</div>
		<!-- End Row --> 
	@include('master.tools.ukuran-bahan.modal')
	{{-- @include('master.tools.ukuran-bahan.edit') --}}

@push('style')
<script type="text/javascript">
    jQuery(document).on('change','#produk_id', function(e){
		var id = jQuery(this).children(":selected").attr("value");
		
		jQuery.ajax({
			type	 : 'get',
			url		 : "{{ url('admin/master/ukuran-bahan/bahan') }}",
			data	 : {id:id},
			typeData : 'json',
			success:function(data)
			{
				console.log(data)
				jQuery('.ukuranBahan').remove();
				var tablaDatos = jQuery('#bahan');
				
				jQuery(data).each(function(key,value){
					    tablaDatos.append("<option class='ukuranBahan' value='"+value.id+"'>"+value.nm_barang+"</option>");
					});
				
			}
		})

	})

	// jQuery(document).on('change','#edit_id', function(e){
	// 	var id = jQuery(this).children(":seleced").attr("value");
		
	// 	jQuery.ajax({
	// 		type	 : 'get',
	// 		url		 : "{{ url('admin/master/ukuran-bahan/bahan') }}",
	// 		data	 : {id:id},
	// 		typeData : 'json',
	// 		success:function(data)
	// 		{
	// 			console.log(data)
	// 			jQuery('.editBahan').remove();
	// 			var tablaDatos = jQuery('#edit_bahan');
				
	// 			jQuery(data).each(function(key,value){
	// 				    tablaDatos.append("<option class='editBahan' value='"+value.id+"'>"+value.nm_barang+"</option>");
	// 				});
				
	// 		}
	// 	})

	// })
	
</script>
@endpush
@endsection