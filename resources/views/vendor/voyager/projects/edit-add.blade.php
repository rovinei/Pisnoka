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
                                <i class="voyager-character"></i> Project Title
                                <span class="panel-desc"> The title for your project</span>
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
                            <h3 class="panel-title"><i class="icon wb-book"></i> Project Content</h3>
                            <div class="panel-actions">
                                <a class="panel-action voyager-resize-full" data-toggle="panel-fullscreen" aria-hidden="true"></a>
                            </div>
                        </div>
                        <!-- @include('voyager::multilingual.input-hidden', [
                            '_field_name'  => 'body',
                            '_field_trans' => get_field_translations($dataTypeContent, 'body', 'rich_text_box', true)
                        ]) -->
                        <textarea class="form-control richTextBox" id="richtextbody" name="content" style="border:0px;">@if(isset($dataTypeContent->content)){{ $dataTypeContent->content }}@endif</textarea>
                    </div><!-- .panel -->

                    <!-- ### EXCERPT ### -->
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Excerpt <small>Small description of this project</small></h3>
                            <div class="panel-actions">
                                <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <!-- @include('voyager::multilingual.input-hidden', [
                                '_field_name'  => 'excerpt',
                                '_field_trans' => get_field_translations($dataTypeContent, 'excerpt')
                            ]) -->
                            <textarea class="form-control" name="excerpt">@if (isset($dataTypeContent->excerpt)){{ $dataTypeContent->excerpt }}@endif</textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <!-- ### DETAILS ### -->
                    <div class="panel panel panel-bordered panel-warning">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="icon wb-clipboard"></i> Project Details</h3>
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
                                <label for="name">Project Status</label>
                                <select class="form-control" name="status">
                                    <option value="PUBLISHED" @if(isset($dataTypeContent->status) && $dataTypeContent->status == 'PUBLISHED'){{ 'selected="selected"' }}@endif>published</option>
                                    <option value="DRAFT" @if(isset($dataTypeContent->status) && $dataTypeContent->status == 'DRAFT'){{ 'selected="selected"' }}@endif>draft</option>
                                    <option value="PENDING" @if(isset($dataTypeContent->status) && $dataTypeContent->status == 'PENDING'){{ 'selected="selected"' }}@endif>pending</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">Project Categories</label>
                                <!-- <input type="text" id="tags" name="tag"> -->
                                <select class="form-control select2" name="categories[]" multiple>

                                    {{-- Check that the relationship method exists --}}
                                    @if( method_exists( $dataType->model_name, 'categories') ) )
                                        <?php $selected_values = isset($dataTypeContent) ? $dataTypeContent->categories()->pluck('id')->all() : array(); ?>
                                        <?php
                                        $relationshipListMethod = 'categoriesList';
                                        if (isset($dataTypeContent) && method_exists($dataTypeContent, $relationshipListMethod)) {
                                            $relationshipOptions = $dataTypeContent->$relationshipListMethod();
                                        } else {
                                            $relationshipClass = get_class(app($dataType->model_name)->categories()->getRelated());
                                            $relationshipOptions = $relationshipClass::all();
                                        }
                                        ?>
                                        @foreach($relationshipOptions as $relationshipOption)
                                            <option value="{{ $relationshipOption->id }}" @if(in_array($relationshipOption->id , $selected_values)){{ 'selected="selected"' }}@endif>{{ $relationshipOption->name }}</option>
                                        @endforeach
                                    @endif

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="client">Project Client</label>
                                <input value="@if (isset($dataTypeContent->client)){{ $dataTypeContent->client }}@endif" id="client" type="text" name="client" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="budget">Project Budget</label>
                                <input value="@if (isset($dataTypeContent->budget)){{ $dataTypeContent->budget }}@endif" id="budget" type="text" name="budget" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="due_date">Project Due Date</label>
                                <input value="@if (isset($dataTypeContent->due_date)){{ $dataTypeContent->due_date }}@endif" id="due_date" type="text" name="due_date" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="duration">Project Duration</label>
                                <input value="@if (isset($dataTypeContent->duration)){{ $dataTypeContent->duration }}@endif" id="duration" type="text" name="duration" class="form-control">
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
                                    <input value="@if(isset($dataTypeContent->featured_image)) {{ $dataTypeContent->featured_image }} @endif" type="hidden" name="featured_image" id="txtFeaturedImage" />
                                </div>
                                <div class="imagePreview">
                                    <!-- <p>Image Preview</p> -->
                                    <div id="imagePreviewDiv">
                                        @if(isset($dataTypeContent->featured_image))

                                        <img src="{{ $dataTypeContent->featured_image }}" style="width:100%" />

                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ### SLIDE IMAGES ### -->
                    <div class="panel panel-bordered panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="icon wb-image"></i> Slide Images</h3>
                            <div class="panel-actions">
                                <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                            </div>
                        </div>
                        <div class="panel-body">

                            <div class="custom-form-group">
                                <div class="file-input-wrapper">
                                    <button class="custom-upload-btn image uploadFile" data-type="multi_images" id="uploadImage"><i class="fa fa-upload"></i> Upload Slide Image</button>
                                    <input value='@if(isset($dataTypeContent->slide_images)) {{ $dataTypeContent->slide_images }} @endif' type="hidden" id="slideImgs" name="slide_images">
                                    <input type="hidden" id="txtMultiImages" />
                                </div>
                                <div class="imagePreview">
                                    <!-- <p>Image Preview</p> -->
                                    <div id="slideImagesPreviewDiv">
                                @if(isset($dataTypeContent->slide_images))
                                    @if(is_array(json_decode($dataTypeContent->slide_images,true)))
                                        @foreach(json_decode($dataTypeContent->slide_images,true) as $value)
                                        <div class="img_slide__outer">
                                            <img src="{{ asset($value) }}" style="width:100%; margin-bottom:10px;" />
                                            <span class="btnRmSlideImg">
                                                <i class="fa fa-remove"></i>
                                            </span>
                                        </div>

                                        @endforeach
                                    @endif
                                @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ### SEO CONTENT ### -->
                    <div class="panel panel-bordered panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="icon wb-search"></i> SEO Content</h3>
                            <div class="panel-actions">
                                <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="name">Meta Description</label>
                                <!-- @include('voyager::multilingual.input-hidden', [
                                    '_field_name'  => 'meta_description',
                                    '_field_trans' => get_field_translations($dataTypeContent, 'meta_description')
                                ]) -->
                                <textarea class="form-control" name="meta_description">@if(isset($dataTypeContent->meta_description)){{ $dataTypeContent->meta_description }}@endif</textarea>
                            </div>
                            <div class="form-group">
                                <label for="name">Meta Keywords</label>
                                <!-- @include('voyager::multilingual.input-hidden', [
                                    '_field_name'  => 'meta_keywords',
                                    '_field_trans' => get_field_translations($dataTypeContent, 'meta_keywords')
                                ]) -->
                                <textarea class="form-control" name="meta_keyword">@if(isset($dataTypeContent->meta_keyword)){{ $dataTypeContent->meta_keyword }}@endif</textarea>
                            </div>
                            <div class="form-group">
                                <label for="name">SEO Title</label>
                                <!-- @include('voyager::multilingual.input-hidden', [
                                    '_field_name'  => 'seo_title',
                                    '_field_trans' => get_field_translations($dataTypeContent, 'seo_title')
                                ]) -->
                                <input type="text" class="form-control" name="seo_title" placeholder="SEO Title" value="@if(isset($dataTypeContent->seo_title)){{ $dataTypeContent->seo_title }}@endif">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary pull-right">
                @if(isset($dataTypeContent->id)){{ 'Update Project' }}@else <i class="icon wb-plus-circle"></i> Create New Project @endif
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

    <script src="{{ asset('admins/plugins/selectize/dist/js/standalone/selectize.min.js') }}"></script>

    <script>
        var tagOptions = [
            @if(isset($tags))
                @foreach ($tags as $tag)
                {tag: "{{$tag}}" },
                @endforeach
            @endif
        ];

        $('document').ready(function () {

            var tagSelect = $('#tags').selectize({
                plugins: ['restore_on_backspace', 'remove_button'],
                delimiter: ',',
                persist: false,
                valueField: 'tag',
                labelField: 'tag',
                searchField: 'tag',
                options: tagOptions,
                @if($dataTypeContent->tagged)
                items: [
                    @foreach($dataTypeContent->tagged as $tag)
                    '{{ $tag->tag_name }}',
                    @endforeach
                ],
                @endif
                placeholder: 'Attach tags ...',
                create: function(input) {
                    return {
                        tag: input
                    }
                }
            });

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
