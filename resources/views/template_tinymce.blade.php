<!DOCTYPE html>
<html>
<head>
    <title>My Blog</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    
	<script src="https://cdn.tiny.cloud/1/r61tdwe7quptc3zicrvoj8ej7gnroxlmevlp4c6gbej45rm9/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

	<script>
		tinymce.init({
			selector: '#mytextarea'
		});
	</script>
</head>
<body>
 
<div class="container">
    @yield('content')
</div>
 
</body>
</html>
