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
	              @foreach ($rekap_nilai as $kategori_key => $rekap_nilai_kategori)
		              <?php unset($rekap_nilai_kategori['total_kategori']); ?>
		              <thead class="thead-dark">
		                <tr>
		                	<th>{{chr($count_kategori + 65)}}.</th>
							<th>{{stringProcessing($kategori_key)}}</th>
							@foreach ((array) $rekap_nilai_kategori as $column_key => $value)
								<th>{{stringProcessing($column_key)}}</th>
							@endforeach
		                </tr>
		              </thead>
		              <tbody>
		              	<?php $count_kriteria = 0; ?>
		              	@foreach ((array) $rekap_nilai_kategori[0] as $kriteria_key => $nilai)
		              	<tr>
		              		<td>{{++$count_kriteria}}</td>
		              		<td>{{stringProcessing($kriteria_key)}}</td>
		              		@foreach ((array) $rekap_nilai_kategori as $column_key => $value)
							<td>{{$rekap_nilai_kategori[$column_key][$kriteria_key]}}</td>
							@endforeach
		              	</tr>
		              	@endforeach
		              </tbody>
		              <?php $count_kategori++; ?>
	              @endforeach
	             	<thead class="thead-dark">
	             		@foreach($rekap_nilai['nilai_gerakan_ditempat'] as $rekap)
						<th></th>
	             		@endforeach
	             		<th>{{$rekap_nilai['total_nilai']}}</th>
	             	</thead>
	         	</table>
	        </div>
		</div>
	</center>
</div>
@endsection
