<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Todolist Create</title>

        <link rel="stylesheet" 
        href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" 
        integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" 
        crossorigin="anonymous">

    </head>
    <body>
    Create new list
        <div class="container">        
        {!! Form::open(['route'=>['todolist.store']]) !!}
        
        {!! Form::hidden('user_id', Auth::user()->id) !!}
        
            Title:<br>
            {!! Form::text('title', NULL) !!}<br><br>
            Container:<br>
            {!! Form::textarea('container', NULL) !!}
            <br><br>
            Status:<br>
            {!! Form::radio('status', 0, TRUE) !!}
            {!! Form::label('status', 'Not Complete') !!}<br>
            
            {!! Form::radio('status', 1, FALSE) !!}
            {!! Form::label('status', 'On Progress') !!}<br>
            
            {!! Form::radio('status', 2, FALSE) !!}
            {!! Form::label('status', 'Completed') !!}
        <br><br>
            <div class="row">
                <div class="col-2">
                    {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!} <br>
                </div>
                <div class="col-2">
                    {!! link_to_route('todolist.index', 'Back to Index', [], ['class'=>'btn btn-primary']) !!}
                </div>
            </div>
        </div>
        
        
    </body>
</html>