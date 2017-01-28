<div class="col-md-9">
    <div class="fill-form">
        <div class="card-block">
            <div class="card">
                <div class="card-block">
                    <div class="form-design1">
                        <div class="form-group">
                            <label for="title">
                                {{ trans($trans_path.'general.columns.name') }}
                            </label>

                            <div class="input-group cstm-addon">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <input type="hidden" name="id" value="{{ isset($page['id'])?$page['id']:'add' }}">
                                <input type="text" name="title" id="title" class="form-control"
                                       placeholder="{{ trans($trans_path.'general.columns.name') }}"
                                       value="{{ ViewHelper::getFormValue('title', isset($page['title'])?$page['title']:'') }}" required>
                            </div>
                            @if($errors->has('title'))
                                <small class="text-danger">{!! $errors->first('title') !!}</small>
                            @endif
                        </div>


                        <div class="form-group">
                            <label for="slug">
                                {{ trans($trans_path.'general.columns.slug') }}
                            </label>
                            <div class="input-group cstm-addon">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <input type="text" name="slug" id="slug" class="form-control"
                                       placeholder="{{ trans($trans_path.'general.columns.slug') }}"
                                       value="{{ ViewHelper::getFormValue('slug', isset($page['slug'])?$page['slug']:'') }}" required>
                                <span class="input-group-addon errorMessage" style="border-right: 1px solid #dbdbdb;"></span>
                            </div>

                            @if($errors->has('slug'))
                                <small class="text-danger">{!! $errors->first('slug') !!}</small>
                            @endif
                        </div>

                        <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
                        <div class="form-group">
                            <label for="country">
                                {{ trans($trans_path.'general.columns.description') }}
                            </label>
                            <textarea name="description" id="description" class="form-control textEditor" rows="10">{{ isset($page['description'])?$page['description']:'' }}</textarea>

                            @if($errors->has('description'))
                                <small class="text-danger">{!! $errors->first('description') !!}</small>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var submitFormEnable = false;
    function slugCreate(str) {
        var $slug = '';
        var trimmed = $.trim(str);
        $slug = trimmed.replace(/[^a-z0-9-]/gi, '-').
        replace(/-+/g, '-').
        replace(/^-|-$/g, '');
        return $slug.toLowerCase();
    }

    $('input[name="title"], input[name="slug"]').on('change keyup', function () {
        var name = $(this).val();
        $('input[name="slug"]').val(slugCreate(name));
    });

    $('input, button').on('focus click change',function () {
        checkSlugInServer();
    });
    $(document).ready(function () {
        checkSlugInServer();
    });


    $('form').on('submit', function () {
        alert('hello');
        return false;
        checkSlugInServer();
        return submitFormEnable;
    });


    function checkSlugInServer(){
        $('.errorMessage').html('<i class="text-warning fa fa-spin fa-spinner"></i>');
        $('input[name="slug"]').closest('.form-group').removeClass('has-success has-warning has-danger');
        var slug = $('input[name="slug"]').val();
        var id = $('input[name="id"]').val();
        var baseUrl = "{{route($base_route.'.check-slug')}}";
        $.ajax({
            type: "POST",
            url : baseUrl,
            data : {'slug': slug, 'id': id, _token: $('meta[name=csrf-token]').attr("content")},
            success : function(data){
                if(data == 'yes'){
                    submitFormEnable = true;
                    $('input[name="slug"]').closest('.form-group').addClass('has-success');
                    $('.errorMessage').html('<i class="text-success fa fa-check"></i>');
                }else if(data == 'no'){
                    $('input[name="slug"]').closest('.form-group').addClass('has-danger');
                    $('.errorMessage').html('<i class="text-danger fa fa-ban"></i>');
                    submitFormEnable = false;
                }else{
                    $('input[name="slug"]').closest('.form-group').addClass('has-warning');
                    $('.errorMessage').html('<i class="text-warning fa fa-ban"></i>');
                    submitFormEnable = false;
                }
            }
        },"html");
    }
</script>


<script>
    //textEditor
    var editor_config = {
        path_absolute : "/",
        selector: ".textEditor",
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
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
</script>
