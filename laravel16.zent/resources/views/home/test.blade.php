<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    

</head>
<body>
	<div class="container" style="padding-top: 50px;">  

		<a href="/todo/create" class="btn btn-success">ADD</a>
        <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Todo</th>
                <th>Create at</th>
                <th>Update at</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            	
            	@foreach ($data as $todo)
		  
              <tr>
                <td>{{$todo->id}}</td>
                <td>{{$todo->todo}}</td>
                <td>{{$todo->created_at}}</td>
                <td>{{$todo->updated_at}}</td>
                <td>
                    <a class="btn btn-success" href="/todos/{{$todo->id}}">Detail</a> 
                     <a class="btn btn-warning">Update</a>  
                    <a class="btn btn-danger" href="/delete/{{$todo->id}}">Delete</a>

                </td>
              </tr>
              
               @endforeach
            </tbody>
          </table>
          {{ $data->links() }}
    </div>
	<!-- <ul>
		@foreach($data as $todo)
			<li>{{ $todo->todo }}</li>   
		@endforeach
	</ul> -->
</body>
</html>
