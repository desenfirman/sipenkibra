<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <title>Registrasi Panitia</title>

	    <!-- Bootstrap -->
	    <!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

		<link rel="stylesheet" type="text/css" href="view/css/mystyle.css">

</head>
<body style= "background-color: #e6eeff">
<nav class="navbar navbar-inverse">
  <div class="container-fluid" style= "background-color: #002266">
	<div class="navbar-header">
	   <a style="color: white;"><img src="images/sipenkibra.jpg" class="img-thumbnail" alt="Cinque Terre" width="50" height="30"></a>
    </div>
	<div class="navbar-header">
      <a style="color: white;" class="navbar-brand">SIPENKIBRA </a>
    </div>
  </div>
</nav>
    <script src="js/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="js/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
	
	<div class = "container-fluid">
    <div class = "row">
      <div class="col-md-offset-4 col-md-4 login-from">
          <h3><em class="glyphicon glyphicon-user"></em> REGISTRASI PANITIA</h3>
          <br>
              <div class="form-group">
                  <label>Username</label>
                  <input type="text" class="form-control" name="username" placeholder="Username" />
              </div>
              <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" name="password" placeholder="Password" />
              </div>
			  <div class="form-group">
                  <label>Nama Panitia</label>
                  <input type="text" class="form-control" name="namaPanitia" placeholder="namaPanitia" />
              </div>
              <div class="form-group">
                  <label>Kode Otorisasi</label>
                  <input type="password" class="form-control" name="kodeOterisasi" placeholder="kodeOterisasi" />
              </div>
             <div class="text-right">
                  <button type="submit" class="btn btn-primary"><span>Registrasi</span></button>
              </div>
        </div>
    </div>
</div>
</body>
</html>
