@section('assets-top')
<link href="{{ asset('assets/blog-admin/vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
<script src="{{ asset('assets/blog-admin/vendor/tinymce/tinymce.min.js') }}"></script>
{{-- <script>
    var editor_config = {
      path_absolute : "/",
      selector: '#textarea', 
      height: 250,
      theme: 'modern',
      plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor colorpicker textpattern"
      ],
      toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
      fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt',
      image_advtab: true,
      content_css: [
        '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
        '//www.tinymce.com/css/codepen.min.css'
      ],
      relative_urls: false,
      file_browser_callback : function(field_name, url, type, win) {
        var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
        var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
        var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
          if (type == 'image') {
            cmsURL = cmsURL + "&type=Images";
          } else {
            cmsURL = cmsURL + "&type=Files";
          }
      
          tinyMCE.activeEditor.windowManager.open({
            file : cmsURL,
            title : 'Filemanager',
            width : x * 0.8,
            height : y * 0.8,
            resizable : "yes",
            close_previous : "no"
          });
      }
    };
    tinymce.init(editor_config);
</script> --}}
@endsection
    
<div class="row">
  <div class="col-md-12">
      <div class="card">
          <div class="card-header text-white bg-primary">
              About Us Details
          </div>
          <div class="card-body">
              <div class="form-group">
                  <label for="title">About</label>
                  {!! Form::textarea('about', null, ['id' => 'about', 'class' => $errors->has('about') ? 'form-control is-invalid' : 'form-control', 'required', 'autofocus']) !!}
                  @if ($errors->has('about'))
                      <span class="invalid-feedback">
                          <strong>{{ $errors->first('about') }}</strong>
                      </span>
                  @endif
              </div>
              <div class="form-group">
                <label for="title">Vision</label>
                {!! Form::textarea('vision', null, ['id' => 'vision', 'class' => $errors->has('vision') ? 'form-control is-invalid' : 'form-control', 'required', 'autofocus']) !!}
                @if ($errors->has('vision'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('vision') }}</strong>
                    </span>
                @endif
            </div>
              <div class="form-group">
                  <label>Mission</label>
                  {!! Form::textarea('mission', null, ['id' => 'textarea', 'class' => $errors->has('mission') ? 'form-control is-invalid' : 'form-control']) !!}
                  @if ($errors->has('mission'))
                      <span class="invalid-feedback">
                          <strong>{{ $errors->first('mission') }}</strong>
                      </span>
                  @endif
              </div>
          </div>
          <div class="card-footer bg-transparent">
            <button class="btn btn-primary" type="submit">
                Submit
            </button>
      </div>
    </div>
  </div>
</div>


@section('assets-bottom')
<script src="{{ asset('assets/blog-admin/vendor/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
<script src="{{ asset('vendor/laravel-filemanager/js/lfm.js') }}"></script>
<script>
    $(document).ready( function () {
        $("#datetime").datetimepicker({
            format: 'yyyy-mm-dd hh:ii:00',
            autoclose: true
        });
        $('#lfm').filemanager('image');
    });
</script>
@endsection