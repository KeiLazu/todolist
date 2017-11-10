<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Todolist Edit</title>

        <link rel="stylesheet" 
        href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" 
        integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" 
        crossorigin="anonymous">

    </head>
    <body>
    Details | {{$todolist->title}}<br><br>
        <div class="container">
        
        {!! Form::open(['method'=>'PUT', 'route'=>['todolist.update', $todolist->id]]) !!}
        {{method_field('PUT')}}
            Title:<br>
            {!! Form::text('title', $todolist->title) !!}<br><br>
            Container:<br>
            {!! Form::textarea('container', $todolist->container) !!}
            <br><br>
            Status:<br>
            {!! Form::radio('status', 0, $todolist->status == 0 ? TRUE:FALSE) !!}
            {!! Form::label('status', 'Not Complete') !!}<br>
            
            {!! Form::radio('status', 1, $todolist->status == 1 ? TRUE:FALSE) !!}
            {!! Form::label('status', 'On Progress') !!}<br>
            
            {!! Form::radio('status', 2, $todolist->status == 2 ? TRUE:FALSE) !!}
            {!! Form::label('status', 'Completed') !!}
        <br><br>
            <div class="row">
                <div class="col-2">
                    {!! Form::submit('Edit', ['class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!} <br>
                </div>
                <div class="col-2">
                    {!! Form::open(['method'=>'GET', 'route'=>['todolist.show', $todolist->id]]) !!}
                    {!! Form::submit('Back', ['class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!} <br>
                </div>
            </div>
        </div>        
    </body>
</html>