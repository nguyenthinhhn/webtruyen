<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
        </style>
    </head>
    <body>
        <form action="/calender/import" method="POST" role="form" enctype="multipart/form-data">
            <legend>Form title</legend>
            @csrf
            <div class="form-group">
                <label for="">label</label>
                <input type="file" class="form-control" name="calender" id="" placeholder="Input field">
            </div>
        
            
        
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </body>
</html>
