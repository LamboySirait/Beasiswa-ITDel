<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="{{url(asset('assets/logo.png'))}}">
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"> -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Roboto&display=swap" rel="stylesheet">
  <title>@yield('title') | Beasiswa</title>
  @vite('resources/css/app.css')
  @vite('resources/js/app.js')
  <style>
    html,
    body {
      height: 100%;
    }

    body {
      display: flex;
      flex-direction: column;
    }

    .content-wrapper {
      flex: 1;
      /* margin-bottom: 100px; */
      /* Atur margin bottom sesuai tinggi footer */
    }

    .footer {
      margin-top: auto;
      /* Footer akan berada di bawah konten dan menempel di bawah */
    }
  </style>

  	<script src="https://cdn.tiny.cloud/1/r61tdwe7quptc3zicrvoj8ej7gnroxlmevlp4c6gbej45rm9/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

	<script>
		tinymce.init({
			selector: '#mytextarea'
		});
	</script>

</head>

<body>
  @include('sweetalert::alert')
  @include('layouts.navbar')

  <div class="content-wrapper">
    @yield('content')
  </div>

  @include('layouts.footer', ['class' => 'footer'])
</body>


</html>