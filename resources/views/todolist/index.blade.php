{{--  @include('layouts.app')  --}}

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
        <link rel="stylesheet" href="/css/toastr.min.css">
        <script src="/js/jquery.min.js"></script>
        <script src="/js/toastr.min.js"></script>
    </head>
    <body>
    @include('toast.message')
        Todolist Index
        <div class="container">
          <div class="row align-items-center">
            <div class="col">{!! link_to_route('todolist.create', 'Create New', [],['class'=>'btn btn-primary btn-sm']) !!}</div>
            <div class="col">{!! link_to_route('userdetail.index', 'Profile', [],['class'=>'btn btn-primary btn-sm']) !!}</div>
            <div class="col">{!! link_to_route('todolist.importexport', 'Import Export', [], ['class'=>'btn btn-primary btn-sm']) !!}</div>
            <div class="col">{!! link_to_route('todolist.pdf', 'Convert to PDF', [], ['class'=>'btn btn-primary btn-sm', 'target'=>'_blank']) !!}</div>
          </div><br>
          <div class="table-responsive table-hover table-condensed table-bordered">
            {{--  <div class="row align-items-center">  --}}
            <table class="table">
                {{--  <div class="col-4">Title</div>  --}}
                {{--  <div class="col-6">Container</div>  --}}
                {{--  <div class="col-2">
                {!! link_to_route('todolist.create', 'Create New', [],['class'=>'btn btn-primary']) !!}
                </div>  --}}
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Container</th>
                    <th>Status</th>
                    <th></th>
                </tr>
                <thead>
            {{--  <div class="row align-items-center">  --}}
            {{--  <table class="table">
                <div class="col-4"></div>
                <div class="col-6"></div>
                <div class="col-2">
                {!! link_to_route('userdetail.index', 'Profile', [],['class'=>'btn btn-primary']) !!}
                </div>
            </table><br>  --}}
            @foreach($todolisting as $todolistdata)
            {{--  <div class="row align-items-center">  --}}
            <tbody>
                {{--  <div class="col-4">{{$todolistdata->title}}</div>
                <div class="col-6">{!! $todolistdata->container !!}</div>
                <div class="col-2">
                {!! link_to_route('todolist.show', 
                'Detail | ', 
                $todolistdata->id, ['class'=>'btn btn-primary']) !!}</div>  --}}
              <tr>
                <td>{{$todolistdata->title}}</td>
                <td>{!! $todolistdata->container !!}</td>
                <td>{!! (($todolistdata->status == 0) ? "<span class='text text-danger'>Not Complete</span>" : 
                (($todolistdata->status == 1) ? "<span class='text text-warning'>On Progress</span>" : 
                "<span class='text text-success'>Completed</span>")) !!}</td>
                <td>{!! link_to_route('todolist.show', 
                'Detail', 
                $todolistdata->id, ['class'=>'btn btn-primary']) !!}</td>
              </tr>
            </tbody>
                @endforeach
                </table><br>
        </div>
    </body>
</html>