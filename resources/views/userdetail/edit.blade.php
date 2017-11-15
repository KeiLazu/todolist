<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>User Edit</title>

        <link rel="stylesheet" 
        href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" 
        integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" 
        crossorigin="anonymous">

    </head>
    <body>
    Details | {{$UserDetail->nama}} <br><br>
        <div class="container">
        
        {!! Form::open(['method'=>'PUT', 'route'=>['userdetail.update', $UserDetail->id]]) !!}
        {{method_field('PUT')}}
            Name:<br>
            {!! Form::text('nama', $UserDetail->nama) !!}<br><br>
            Address:<br>
            {!! Form::text('alamat', $UserDetail->alamat) !!}
            <br><br>
            Phone Number:<br>
            {!! Form::text('nomor_telepon', $UserDetail->nomor_telepon) !!}
        <br><br>
            <div class="row">
                <div class="col-2">
                    {!! Form::submit('Edit', ['class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!} <br>
                </div>
                <div class="col-2">
                    {!! Form::open(['method'=>'GET', 'route'=>['userdetail.show', Auth::id()]]) !!}
                    {!! Form::submit('Back', ['class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!} <br>
                </div>
            </div>
        </div>        
    </body>
</html>