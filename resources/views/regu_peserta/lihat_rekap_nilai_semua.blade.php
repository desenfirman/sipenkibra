@extends('layouts.app')

<?php
function stringProcessing($field_name)
{
    $words = str_replace("_", " ", $field_name);
    echo ucwords($words);
}
?>
@section('content')
	<div class = "container">
        <div class = "row">
          <div class="col-md-12 login-from text-center">
          <div style= "display:inline-block;" class="col-md-12 login-from text-center">
    	   <font face="Arial" size="2" color="navy"> <center> PBB FORMASI, VARIASI & YEL-YEL </center></font>
    	   <font face="Arial" size="2" color="navy"> <center> KOMANDO PASKIBRA </center></font>
    	   <font face="Arial" size="2" color="navy"> <center> TAHUN 2018 </center></font>
    	   <font face="Arial" size="2" color="navy"> <center> REKAPITULASI PENILAIAN JURI LOMBA PBB FORMASI, VARIASI & YEL-YEL </center></font>
    	   <br><br><br>
          </div>
    	  <br>
          <div class="table-responsive">
              <table class="table table-stripped">
                  <thead class="thead-dark">
                    @foreach ($rekap_nilais as $no_regu_key => $rekap_nilai)
                      <tr>
                          <th>No.</th>
                          @foreach ($rekap_nilais[$no_regu_key] as $header => $value)
                          <th>{{stringProcessing($header)}}</th>
                          @endforeach
                          <?php break; ?>
                      </tr>
                    @endforeach
                  </thead>
                  <tbody>
                    @foreach ($rekap_nilais as $no_regu_key => $rekap_nilai)
                    <tr>
                        <td>{{$no_regu_key}}</td>
                        @foreach ($rekap_nilais[$no_regu_key] as $header)
                        <td>{{$header}}</td>
                        @endforeach
                    </tr>
                    @endforeach
                  </tbody>
              </table>
          </div>
		</div>
    </div>
    <br>
</div>
@endsection
