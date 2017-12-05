@extends('layouts.app')

@section('content')
	<div class = "container"><br><br>
        <center>
      <div class="col-md-offset-2 col-md-8 login-from text-center">
          <div style= "display:inline-block;" class="col-md-12 login-from text-center">
    	   <font face="Arial" size="2" color="navy"> <center> PBB FORMASI, VARIASI & YEL-YEL </center></font>
    	   <font face="Arial" size="2" color="navy"> <center> KOMANDO PASKIBRA </center></font>
    	   <font face="Arial" size="2" color="navy"> <center> TAHUN 2018 </center></font>
    	   <font face="Arial" size="2" color="navy"> <center> REKAPITULASI PENILAIAN JURI LOMBA PBB FORMASI, VARIASI & YEL-YEL </center></font>
    	   <br><br><br>
          </div>
	  <br>
        <div class="table-responsive">
			<table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>No. Regu</th>
                        <th>Nama Regu</th>
                        <th>Asal Sekolah</th>
                        <th>Total PBB</th>
                        <th>Peringkat</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($peringkat as $regu_peserta_key => $regu_peserta)
				<tr>
                    <td>{{$peringkat[$regu_peserta_key]['no_regu']}}</td>
                    <td>{{$peringkat[$regu_peserta_key]['nama_regu']}}</td>
                    <td>{{$peringkat[$regu_peserta_key]['nama_sekolah']}}</td>
                    <td>{{$peringkat[$regu_peserta_key]['rekap_nilai']['total_nilai']}}</td>
                    <td>{{($regu_peserta_key + 1)}}</td>

                </tr>
                @endforeach
                </tbody>
		</table>
        </div>
    </center>
    <br>
</div>
@endsection
