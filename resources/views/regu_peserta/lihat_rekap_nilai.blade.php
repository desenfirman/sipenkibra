@extends('layouts.app')


@section('content')
<?php
function stringProcessing($field_name)
{
    $words = str_replace("_", " ", $field_name);
    echo ucwords($words);
}
?>
<div class="container"><br><br>
	<center>
		<div class="col-md-offset-2 col-md-8 login-from">
	      	<div style= "display:inline-block;" class="col-md-12 login-from">
	      		<center> <h5> PBB FORMASI, VARIASI & YEL-YEL </h5></center>
	      		<center> <h5> KOMANDO PASKIBRA </h5></center>
	     		<center> <h5> TAHUN 2018 </h5></center>
	     		<center> <h5> REKAPITULASI PENILAIAN JURI LOMBA PBB FORMASI, VARIASI & YEL-YEL </h5></center>
	     		<br><br>
	     	</div>
	  		<div class="table-responsive">
	            <table class="table table-striped">
			      	<?php
                      $count_kategori = 0;
                      ?>
	              @foreach ($data['rekap_nilai'] as $kategori_key => $rekap_nilai_kategori)
		              <thead class="thead-dark">
		                <tr>
									<th>{{chr($count_kategori + 65)}}.</th>
									<th>{{stringProcessing($kategori_key)}}</th>
									@foreach($rekap_nilai_kategori as $juri_key => $juri)
									@if($juri_key === "jumlah")
										<th>Total Keseluruhan</th>
										@else
										<th>Juri {{ ($juri_key + 1) }}</th>
										@endif
									@endforeach
								<?php $count_kategori++; ?>
		                </tr>
		              </thead>
		              <tbody>
		              	<?php $count = 0; ?>
		              	@foreach ($rekap_nilai_kategori[0] as $key => $value)
							<tr>
								<td>{{($count + 1)}}</td>
								<td>{{stringProcessing($key)}}</td>
								@foreach($rekap_nilai_kategori as $juri_count)
									<td>{{$juri_count[$key]}}</td>
								@endforeach
							</tr>
							<?php $count++; ?>
						@endforeach
		              </tbody>
	              @endforeach
	             	<thead class="thead-dark">
	             		<th>Jumlah</th>
	             		@foreach($data['rekap_nilai']['nilai_gerakan_ditempat'] as $rekap)
						<th></th>
	             		@endforeach
	             		<th>{{$data['total_nilai']}}</th>
	             	</thead>
	         	</table>
	        </div>
		</div>
	</center>
</div>
@endsection
