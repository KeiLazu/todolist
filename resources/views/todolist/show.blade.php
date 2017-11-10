<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Todolist Details</title>

        <link rel="stylesheet" 
        href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" 
        integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" 
        crossorigin="anonymous">

    </head>
    <body>
    Details | "{{$todolist->title}}"<br><br>
        <div class="container">
            Title:<br>
            {{$todolist->title}}<br><br>
            Container:<br>
            {{$todolist->container}}<br><br>
            Status:<br>
            @php
                switch($todolist->status) {
                case 0:
                    echo 'Not Complete';
                break;
                case 1:
                    echo 'On Progress';
                break;
                case 2:
                    echo 'Completed';
                break;
                }
            @endphp
        <br><br>
            <div class="row">
                <div class="col-2">
                    {!! Form::open(['method'=>'GET', 'route'=>['todolist.edit', $todolist->id]]) !!}
                        {!! Form::submit('Edit', ['class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!} <br>
                </div>
                <div class="col-2">
                    {!! Form::open(['method'=>'DELETE', 'route'=>['todolist.destroy', $todolist->id]]) !!}
                    {{method_field('DELETE')}}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!} <br>
                </div>
            </div>
        </div>
        {!! link_to_route('todolist.index', 'Back', [], ['class'=>'btn btn-primary']) !!}
    </body>
</html>