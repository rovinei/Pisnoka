@extends('voyager::master')

@if(isset($dataTypeContent->id))
    @section('page_title','Edit '.$dataType->display_name_singular)
@else
    @section('page_title','Add '.$dataType->display_name_singular)
@endif

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/admins/css/dashboard.css') }}">
    <style>
        .panel .mce-panel {
            border-left-color: #fff;
            border-right-color: #fff;
        }

        .panel .mce-toolbar,
        .panel .mce-statusbar {
            padding-left: 20px;
        }

        .panel .mce-edit-area,
        .panel .mce-edit-area iframe,
        .panel .mce-edit-area iframe html {
            padding: 0 10px;
            min-height: 350px;
        }

        .mce-content-body {
            color: #555;
            font-size: 14px;
        }

        .panel.is-fullscreen .mce-statusbar {
            position: absolute;
            bottom: 0;
            width: 100%;
            z-index: 200000;
        }

        .panel.is-fullscreen .mce-tinymce {
            height:100%;
        }

        .panel.is-fullscreen .mce-edit-area,
        .panel.is-fullscreen .mce-edit-area iframe,
        .panel.is-fullscreen .mce-edit-area iframe html {
            height: 100%;
            position: absolute;
            width: 99%;
            overflow-y: scroll;
            overflow-x: hidden;
            min-height: 100%;
        }
    </style>
@stop

@section('page_header')
    <h1 class="page-title">
        <i class="{{ $dataType->icon }}"></i> @if(isset($dataTypeContent->id)){{ 'Edit' }}@else{{ 'New' }}@endif {{ $dataType->display_name_singular }}
    </h1>
    <!-- @include('voyager::multilingual.language-selector') -->
@stop

@section('content')
    <div class="page-content container-fluid">
        <form class="form-edit-add" role="form" action="@if(isset($dataTypeContent->id)){{ route('voyager.'.$dataType->slug.'.update', $dataTypeContent->id) }}@else{{ route('voyager.'.$dataType->slug.'.store') }}@endif" method="POST" enctype="multipart/form-data">
            <!-- PUT Method if we are editing -->
            @if(isset($dataTypeContent->id))
                {{ method_field("PUT") }}
            @endif
            {{ csrf_field() }}

            <div class="row">
                <div class="col-md-8">
                    <!-- ### TITLE ### -->
                    <div class="panel">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <i class="voyager-character"></i> Title
                                <span class="panel-desc"> The title for your recognition</span>
                            </h3>
                            <div class="panel-actions">
                                <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <!-- @include('voyager::multilingual.input-hidden', [
                                '_field_name'  => 'title',
                                '_field_trans' => get_field_translations($dataTypeContent, 'title')
                            ]) -->
                            <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="@if(isset($dataTypeContent->title)){{ $dataTypeContent->title }}@endif">
                        </div>
                    </div>

                    <!-- ### CONTENT ### -->
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="icon wb-book"></i> Description</h3>
                            <div class="panel-actions">
                                <a class="panel-action voyager-resize-full" data-toggle="panel-fullscreen" aria-hidden="true"></a>
                            </div>
                        </div>
                        <!-- @include('voyager::multilingual.input-hidden', [
                            '_field_name'  => 'body',
                            '_field_trans' => get_field_translations($dataTypeContent, 'body', 'rich_text_box', true)
                        ]) -->
                        <textarea class="form-control" name="description" >@if(isset($dataTypeContent->description)){{ $dataTypeContent->description }}@endif</textarea>
                    </div><!-- .panel -->

                </div>
                <div class="col-md-4">
                    <!-- ### DETAILS ### -->
                    <div class="panel panel panel-bordered panel-warning">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="icon wb-clipboard"></i> Recognition Details</h3>
                            <div class="panel-actions">
                                <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="name">URL slug</label>
                                <!-- @include('voyager::multilingual.input-hidden', [
                                    '_field_name'  => 'slug',
                                    '_field_trans' => get_field_translations($dataTypeContent, 'slug')
                                ]) -->
                                <input type="text" class="form-control" id="slug" name="slug"
                                    placeholder="slug"
                                    {{!! isFieldSlugAutoGenerator($dataType, $dataTypeContent, "slug") !!}}
                                    value="@if(isset($dataTypeContent->slug)){{ $dataTypeContent->slug }}@endif">
                            </div>

                            <div class="form-group">
                                <label for="name">Featured</label>
                                <input type="checkbox" name="is_featured" @if(isset($dataTypeContent->is_featured) && $dataTypeContent->is_featured){{ 'checked="checked"' }}@endif>
                            </div>
                        </div>
                    </div>

                    <!-- ### IMAGE ### -->
                    <div class="panel panel-bordered panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="icon wb-image"></i> Thumbnail Image</h3>
                            <div class="panel-actions">
                                <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <!-- @if(isset($dataTypeContent->image))
                                <img src="{{ $dataTypeContent->image }}" style="width:100%" />
                            @endif -->
                            <!-- <input type="file" name="image"> -->
                            <!-- Featured image field -->
                            <div class="custom-form-group">
                                <div class="file-input-wrapper">
                                    <button class="custom-upload-btn image uploadFile" data-type="image" id="uploadImage"><i class="fa fa-upload"></i> Upload Thumbnail</button>
                                    <input value="@if(isset($dataTypeContent->image)) {{ $dataTypeContent->image }} @endif" type="hidden" name="image" id="txtFeaturedImage" />
                                </div>
                                <div class="imagePreview">
                                    <!-- <p>Image Preview</p> -->
                                    <div id="imagePreviewDiv">
                                        @if(isset($dataTypeContent->image))

                                        <img src="{{ $dataTypeContent->image }}" style="width:100%" />

                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <button type="submit" class="btn btn-primary pull-right">
                @if(isset($dataTypeContent->id)){{ 'Update' }}@else <i class="icon wb-plus-circle"></i> Save @endif
            </button>
        </form>

        <!-- <iframe id="form_target" name="form_target" style="display:none"></iframe>
        <form id="my_form" action="{{ route('voyager.upload') }}" target="form_target" method="post" enctype="multipart/form-data" style="width:0px;height:0;overflow:hidden">
            {{ csrf_field() }}
            <input name="image" id="upload_file" type="file" onchange="$('#my_form').submit();this.value='';">
            <input type="hidden" name="type_slug" id="type_slug" value="{{ $dataType->slug }}">
        </form> -->
    </div>

    @includeIf('admin.partials._upload_file')
@stop

@section('javascript')

    <script>

        $('document').ready(function () {

            $('#slug').slugify();

            @if ($isModelTranslatable)
            $('.side-body').multilingual({"editing": true});
            @endif
        });
    </script>
    @if($isModelTranslatable)
        <script src="{{ voyager_asset('js/multilingual.js') }}"></script>
    @endif
    <script src="{{ asset('/admins/plugins/tinymce/tinymce.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('/admins/plugins/tinymce/tinymce-config.js') }}"></script>
    <script src="{{ voyager_asset('js/slugify.js') }}"></script>
    <script>

        function responsive_filemanager_callback(field_id){
            var uploadImageModal = UIkit.modal("#fileManagerModal")
                imageUrl="",
                imgArr = [],
                domain = "{{ URL('/') }}";
            switch(field_id){
                case 'txtFeaturedImage':
                    imageUrl = $('#'+field_id).val();
                    $('#imagePreviewDiv').empty().append(''+
                        '<img src="'+imageUrl+'" style="width:100%; margin-bottom:10px;">'+
                    '');
                    break;
                case 'txtMultiImages':
                    imageUrl = $('#'+field_id).val();
                    imageUrl = imageUrl.replace(domain,'');
                    imgArr.push(imageUrl);
                    $('#slideImagesPreviewDiv img').each(function(i,k,v){
                        var imgSrc = $(this).attr('src');
                        imgArr.push(imgSrc);
                    });
                    $('#slideImgs').val(JSON.stringify(imgArr));
                    $('#slideImagesPreviewDiv').append(''+
                        '<div class="img_slide__outer">'+
                            '<img src="'+imageUrl+'" style="width:100%; margin-bottom:10px;">'+
                            '<span class="btnRmSlideImg">'+
                                '<i class="fa fa-remove"></i>'+
                            '</span>'+
                        '</div>'+
                    '');
                    break;
                case 'sound_url':
                    var playing = false,
                        audioEle = $('#audioEle').bind('play', function () {
                                    playing = true;
                                }).bind('pause', function () {
                                    playing = false;
                                }).bind('ended', function () {
                                    audio.pause();
                                }).get(0);
                    var supportsAudio = !!document.createElement('audio').canPlayType;
                    if (supportsAudio){
                        $(audioEle).attr('src', $('#'+field_id).val());
                    }
                    break;

                default:
                    return;

            }

            uploadImageModal.toggle();

        }

        $(document).on('click', '.btnRmSlideImg', function(){
            var imgArr = [];
            $(this).parents(".img_slide__outer").remove();
            $('#slideImagesPreviewDiv img').each(function(i,k,v){
                var imgSrc = $(this).attr('src');
                imgArr.push(imgSrc);
            });
            $('#slideImgs').val(JSON.stringify(imgArr));

        });

    </script>

@stop
