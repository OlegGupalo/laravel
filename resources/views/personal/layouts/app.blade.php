<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="{{URL::asset('css/app.css')}}" type="text/css">
	<script src="{{ URL::asset('js/app.js') }}"></script>
	<title>@yield('title-block')</title>
</head>
<body>
	@if(Request::is('/'))
	@endif
	<div class="container mt-5">
		<div class="row">
			<div class="col-7">
				@yield('content')
			</div>
		</div>
	</div>
</body>
</html>