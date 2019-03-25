<!DOCTYPE html>
<html>
<head>
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<script src="//code.jquery.com/jquery.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.1/tinymce.min.js"></script>
	<script>tinymce.init({ selector:'textarea' });</script>
</head>
<body>
	@if (count($errors) > 0)
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
	@endif
	<form action="/post" method="POST" role="form" id="test-form">
		<legend>Form title</legend>

		<div class="form-group">
			@csrf
			<label for="">Name</label>
			<input type="text" class="form-control" id="name" placeholder="Input field" name="name">
			<textarea id="content" name="content">aaaaaaaaaaaaaaaa</textarea>

		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
  {{-- <textarea id="aa" name="aa">aaaaaaaaaaaaaaaa</textarea>
  <button type="button" class="btn btn-default" id="bt">button</button>
  <script type="text/javascript">
  	// tinymce.get('aa').setContent('bbbbb')
  	$('#bt').click(function(){
  		alert(tinymce.get('aa').getContent())
  	})
  </script> --}}
  <script type="text/javascript">
  	$('#test-form').submit(function(e){
		e.preventDefault()
  		$.ajax({
  			type: 'post',
  			url: '/post',
  			data: {
  				_token: $('input[name="_token"]').val(),
  				name: $('#name').val(),
  				content: $('#content').val()
  			},
  			success:function(){

  			},
  			error:function(data, textStatus, jqXHR){
  				console.log(data.responseJSON.errors.name)
  			}
  		})
  	})
  </script>
</body>
</html>