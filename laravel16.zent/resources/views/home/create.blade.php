<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Add</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    
    
</head>
<body>
    <div class="container" style="padding-top: 50px;">

        <form action="/todos" method="POST" role="form" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Todo</label>
                <input type="text" class="form-control" id="" placeholder="aaaaa" name="todo">
            </div>
            
            <button type="submit" class="btn btn-primary">ADD</button>
        </form>
    </div>
</body>
</html>