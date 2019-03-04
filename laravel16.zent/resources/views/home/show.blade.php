<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Detail</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    
    
</head>
<body>
	<h1 class="text-center">Detail</h1>
    <div class="container" style="padding-top: 50px;">
    	<table class="table" style="width: auto;">
    		<tr>
    			<td style="width: 10%; font-weight: bold;">ID</td>
    			<td>{{ $data->id }}</td>
    		</tr>
    		<tr>
    			<td style="font-weight: bold;">Todo</td>
    			<td>{{ $data->todo }}</td>
    		</tr>
    		<tr>
    			<td style="font-weight: bold;">Created_at</td>
    			<td>{{ $data->created_at }}</td>
    		</tr>
    		<tr>
    			<td style="font-weight: bold;">Updated_at</td>
    			<td>{{ $data->updated_at }}</td>
    		</tr>

    	</table>
    </div>
</body>
</html>


