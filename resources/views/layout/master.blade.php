
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


	<title>Starter Template for Bootstrap</title>

	@include('layout.style')

</head>

<body style="background-color:#f4f4f4;">
	<div >
		@include('layout.nav')
		<div class="container" >

			@yield('content')

		</div>

	</div>
	@include('layout.script');
</body>
</html>

