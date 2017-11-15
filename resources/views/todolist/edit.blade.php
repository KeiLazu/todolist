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
            <textarea value="{{old('container')}}" class="form-control editor" name="container" rows="10" cols="50">{{$todolist->container}}</textarea>
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

    <script>
  var editor_config = {
    path_absolute : "/",
    selector: "textarea.editor",
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern codesample",
      "fullpage toc tinymcespellchecker imagetools help"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic strikethrough | alignleft aligncenter alignright alignjustify | ltr rtl | bullist numlist outdent indent removeformat formatselect| link image media | emoticons charmap | code codesample | forecolor backcolor",
    external_plugins: { "nanospell": "http://YOUR_DOMAIN.COM/js/tinymce/plugins/nanospell/plugin.js" },
    nanospell_server:"php",
    browser_spellcheck: true,
    relative_urls: false,
    remove_script_host: false,
    file_browser_callback : function(field_name, url, type, win) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
      if (type == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinymce.activeEditor.windowManager.open({
        file: '<?= route('elfinder.tinymce4') ?>',// use an absolute path!
        title: 'File manager',
        width: 900,
        height: 450,
        resizable: 'yes'
      }, {
        setUrl: function (url) {
          win.document.getElementById(field_name).value = url;
        }
      });
    }
  };

  tinymce.init(editor_config);
</script>
<script>
  {!! \File::get(base_path('vendor/barryvdh/laravel-elfinder/resources/assets/js/standalonepopup.min.js')) !!}
</script>


</html>