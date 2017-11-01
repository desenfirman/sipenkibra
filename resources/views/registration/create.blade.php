<head>
	@include('layouts.style')

	<meta name="csrf-token" content="{{ csrf_token() }}" />

</head>
<body>


		<!-- Main -->
			<section id="main" class="wrapper" >
				<div class="container">
						<h2 style="text-align: center;">Sign Up</h2>
						<form method="POST" action="/register" style="margin-left:35%;margin-right:35%;max-width: 100%;">
							{{csrf_field()}}

							<input type="email" name="email" id="email" placeholder="E-mail">
							<br>
							<input type="text" name="username" id="username" placeholder="Username">
							<br>
							<input type="text" name="name" id="name" placeholder="Name">
							<br>
							<input type="password" name="password" id="password" placeholder="Password">
							<br>
							<input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password">
							<br>
							<input type="hidden" name="_token" value="{{ csrf_token() }}">

							<div style="text-align: right;">
								<input type="submit" value="Sign Up" style="width: 100%;">
							<div>
							<br>
						</form>
					</div>
				</div>
			</section>
		@include('layouts.script')

	</body>
