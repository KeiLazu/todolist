<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Todolist Index</title>

        <link rel="stylesheet" 
        href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" 
        integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" 
        crossorigin="anonymous">

    </head>
    <body>
        Todolist Index
        <div class="container">
            <div class="row">
                <div class="col-4">Title</div>
                <div class="col-6">Container</div>
                <div class="col-2">
                {!! link_to_route('todolist.create', 'Create New', [],['class'=>'btn btn-primary']) !!}
                </div>
            </div><br>
            <div class="row">
                <div class="col-4"></div>
                <div class="col-6"></div>
                <div class="col-2">
                {!! link_to_route('userdetail.index', 'Profile', [],['class'=>'btn btn-primary']) !!}
                </div>
            </div><br>
            @foreach($todolisting as $todolistdata)
            <div class="row">
                <div class="col-4">{{$todolistdata->title}}</div>
                <div class="col-6">{{$todolistdata->container}}</div>
                <div class="col-2">
                {!! link_to_route('todolist.show', 
                'Detail | ', 
                $todolistdata->id, ['class'=>'btn btn-primary']) !!}</div>
                </div>
                @endforeach
        </div>
    </body>
</html>