<div class="col-md-7">
	<div class="panel panel-default">
		<div class="panel-title"> Pembayaran
			<ul class="panel-tools">
				<li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
				<li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
				<li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
			</ul>
		</div>
		<div class="panel-body">
			<table class="table display">
				<tr>
					<th style="text-align: right;">Total Harga</th>
					<th width="220">Sudah Bayar</th>
					<th width="40"></th>
				</tr>
				<tr>
					<td align="right">Rp. {{number_format($order->jumhar)}}</td>
					<td colspan="2">Rp. {{number_format($order->piutang->sudah_bayar)}}</td>
				</tr>
				<tr>
					<td align="right">Kurang Bayar : </td>
					<td colspan="2">Rp. {{number_format($order->jumhar - $order->piutang->sudah_bayar)}}</td>
				</tr>
				<form method="post" action="{{route('piutang.update', $order->id)}}">
				{{ csrf_field() }}
				{{ method_field('PUT') }}
				<tr>
					<td align="right">
						<label for="input1" class="form-label">Tipe Pembayaran :</label>
					</td>
					<td colspan="2">
						<div class="form-group">
						<select class="form-control" name="tipe" id="input1" required>
							<option value="">-- Pilih Metode --</option>
							@for($i=0; $i < count($tipe); $i++)
							@if($tipe[$i] == $order->piutang->tipe_pembayaran)
							<option value="{{$tipe[$i]}}" selected>{{$tipe[$i]}}</option>
							@else
							<option value="{{$tipe[$i]}}">{{$tipe[$i]}}</option>
							@endif
							@endfor
						</select>
						</div>
					</td>
				</tr>
				<tr>
					<td align="right"> Bayar : </td>
					<td>
						<div class="form-group">
						<input type="number" name="bayar" min="0" class="form-control" required>
						</div>
					</td>
					<td>
						<button type="submit" class="btn btn-default"><i class="fa fa-save"></i></button>
					</td>
				</tr>
				</form>
			</table>	
		</div>
	</div>
</div>