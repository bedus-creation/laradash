@extends('theme.app')

@section('head')
<link rel="stylesheet" href="{{url('/laradash/plugin/fileupload/fileupload-1.1.css')}}">
<link rel="stylesheet" href="{{url('/laradash/plugin/select2/select2.css')}}">
<link rel="stylesheet" href="{{url('/laradash/plugin/select2/typeahead.css')}}">
@endsection


@section('content')
<div class="container-fluid content">
    <div class="card">
        <div class="card-header">
            <div class="card-title mb-0">
                <span class="section-title">New Blog Form</span>
            </div>
        </div>
        <div class="card-body">
            <form  method ="POST" action="{{url('action/posts')}}" >
                @csrf
                <div class="row" >
                    <div class="col-md-10">
                        <div class = "row">
                            <div class = "col-md-10 offset-md-2">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Title</label>
                            <div class="col-lg-10">
                                <input id = "title" type="text" name = "title"class="form-control" required autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Categories</label>
                            <div class="col-lg-10">
                                <select name="categories[]" id="categories-input" multiple class="form-control">
                                    <option selected>Select Categories</option>
                                </select>
                            </div>                                
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Content</label>
                            <div class="col-lg-10">
                                <textarea id="body" name="body"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2">
                                Cover Image
                            </label>
                            <div class="col-md-10">
                                <div id="cover" class="w-100 btn btn-secondary">Set Cover Image</div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Tags</label>
                            <div class="col-lg-10">
                                <select name="tags[]" id="tags-input" multiple class="form-control">
                                    <option selected>Select Tags</option>
                                </select>
                            </div>                                
                        </div>
                    </div>
                </div>
                <input type="hidden" name="user_id" value="1">
                <div class="row">
                    <div class="col-md-10">
                        <button type="submit" class="btn btn-success float-right">Save Blog</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="/plugin/select2/select2.js"></script>
<script src="/plugin/fileupload/fileupload-1.1.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>
<script>
    $('#body').summernote({
        placeholder: 'Your content goes here........',
        tabsize: 2,
        height: 200
    });

$('#cover').fileupload({
    serverUploadUrl:'{{url('medias')}}',
    serverAllFileUrl:'{{url('medias')}}'
});

$('#tags-input').select2({
    ajax:{
        url: '/tags',
        dataType: 'json',
        delay:1000,
        data: function (params) {
            return {q: params.term}
        },
        processResults: function (data) {
            return {
                results: data.results.map(function(item){
                    return {
                        id: item.text,
                        text: item.text
                    };
                })
            }
        }
    },
    tags:true
});

$('#categories-input').select2({
    ajax:{
        url: '/tags',
        dataType: 'json',
        delay:1000,
        data: function (params) {
            return {q: params.term}
        },
        processResults: function (data) {
            return {
                results: data.results.map(function(item){
                    return {
                        id: item.text,
                        text: item.text
                    };
                })
            }
        }
    },
    tags:true
});
</script>

</script>
@endsection