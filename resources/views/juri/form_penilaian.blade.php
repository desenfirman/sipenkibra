@extends('layouts.app')

@section('content')
<br><br>
<?php
function stringProcessing($field_name)
{
    $words = str_replace("_", " ", $field_name);
    echo ucwords($words);
}
?>
<!-- kanan -->
<div class="container" >
  <br>
  <center>
    <label>
      <h2> FORM <br>PENILAIAN PERLOMBAAN </h2>
      <hr>
    </label>

  </center>
  <div class="row">
  <div class="col-md-1"></div>
  <form class="col-md-10 " method="POST" action="/juri/{{$data_regu_peserta->no_regu}}" onsubmit="return formCheck()">
    {{ csrf_field() }}
    @foreach ($nilai as $kategori => $kriterias)
        <div class="card">
          <div class="" style="padding: 15px;" >
            <h4 style="margin-bottom: 0;"><?php stringProcessing($kategori); ?></h4>
          </div>
          <div class="list-group list-group-flush">
        <?php
            $kriterias = $kriterias[0]->toArray();
        ?>
          @foreach ($kriterias as $kriteria => $value)
                <div  class="list-group-item">
                  <label class="col-md-5"><?php stringProcessing($kriteria); ?></label>
                    <div id="{{$kriteria}}" class="btn-group kriteria" data-toggle="buttons" style="vertical-align: middle; " data-value="{{$value}}" >
                          <label class="btn btn-outline-danger btn-md " onclick="send_value('{{ $kriteria }}', this)"><input type="radio">10</input></label>
                          <label class="btn btn-outline-danger btn-md " onclick="send_value('{{ $kriteria }}', this)"><input type="radio" >20</input></label>
                          <label class="btn btn-outline-danger btn-md " onclick="send_value('{{ $kriteria }}', this)"><input type="radio" >30</input></label>
                          <label class="btn btn-outline-warning btn-md" onclick="send_value('{{ $kriteria }}', this)"><input type="radio" >40</input></label>
                          <label class="btn btn-outline-warning btn-md" onclick="send_value('{{ $kriteria }}', this)"><input type="radio" >50</input></label>
                          <label class="btn btn-outline-warning btn-md" onclick="send_value('{{ $kriteria }}', this)"><input type="radio" >60</input></label>
                          <label class="btn btn-outline-primary btn-md" onclick="send_value('{{ $kriteria }}', this)"><input type="radio" >70</input></label>
                          <label class="btn btn-outline-primary btn-md" onclick="send_value('{{ $kriteria }}', this)"><input type="radio" >80</input></label>
                          <label class="btn btn-outline-primary btn-md" onclick="send_value('{{ $kriteria }}', this)"><input type="radio" >90</input></label>
                          <label class="btn btn-outline-success btn-md" onclick="send_value('{{ $kriteria }}', this)"><input type="radio" >100</input></label>
                          <label ></label>
                     </div>
                </div>
          @endforeach
            </div>
      </div>
      <br><br>
    @endforeach
    <center><input class="btn btn-primary"  type="submit" value="Submit Nilai" ></center>
  </form>
</div>
</div>
<script>

  function formCheck() {
      var fields = $(".kriteria");
      for (var i = 0; i < fields.length; i++) {
        var field = fields[i];

        var value = field.getAttribute('data-value');
        //console.log(value);
        if (value == 0) {
            //field.className.replace(" animated flash", '');
            var field_name = field.getAttribute('id');
            var id = $("#"+field_name+"");
            console.log(id.offset().top );
            $('html,body').animate(
              {
                scrollTop: id.offset().top - 250
              },
              'slow');
            $(id).animateCss('flash');
            showNotify("Kriteria " + field_name + " belum terisi. Mohon diisi terlebih dahulu semua kriteria penilaian sebelum melakukan submit", "warning");
            return false;
        }
       }
  }

    $.fn.extend({
      animateCss: function (animationName, callback) {
          var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
          this.addClass('animated ' + animationName).one(animationEnd, function() {
              $(this).removeClass('animated ' + animationName);
              if (callback) {
                callback();
              }
          });
          return this;
      }
  });

  $(document).ready(function() {
    var kriterias = $(".kriteria");
    for (var i = 0; i < kriterias.length; i++){
      var index = kriterias[i].getAttribute('data-value') / 10 - 1;
      if (index == -1) continue;
      var selected_nilai = kriterias[i].children[index];
      var selected_radio_nilai = selected_nilai.firstElementChild;
      selected_radio_nilai.checked = true;
      selected_nilai.className += " active";
    }
  });

  function send_value(kriteria, obj) {
    var value = obj.innerText;
    var xhttp = new XMLHttpRequest();
    var url_post = {{$data_regu_peserta->no_regu}} + "/" + kriteria;
    var params = "nilai=" + value;
    xhttp.open("POST", url_post);
    xhttp.setRequestHeader('X-CSRF-TOKEN', "{{ csrf_token() }}");
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.onreadystatechange = function() {
      var message = "Silahkan cek kembali koneksi anda";
      var className ="fail";
      if (this.readyState == 4) {
        var res = JSON.parse(this.responseText);
        if (res.status == 0 && this.status == 200) {
          message = "Perubahan untuk kriteria '" + kriteria + "' dengan nilai = '" + value + "' telah tersimpan";
          className = "success";
          document.getElementById(kriteria).setAttribute("data-value", value);
          showNotify(message, className);
        }
      }
    };
    xhttp.send(params);
    console.log(url_post+params);
  }

  function showNotify(message, type) {
        $.notify(
        {
          message: message
        },
        {
          newest_on_top : true,
          type: type
        });
  }
</script>
@endsection
