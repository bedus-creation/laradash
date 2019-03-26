@extends('laradash.theme.app')

@section('head')
<link rel="stylesheet" href="{{url('/laradash/plugin/fileupload/fileupload-1.1.css')}}">
<link rel="stylesheet" href="{{url('/laradash/plugin/select2/select2.css')}}">
<link rel="stylesheet" href="{{url('/laradash/plugin/select2/typeahead.css')}}">
@endsection


@section('content')
<div class="container-fluid content">
    <div class="card">
        @yield('success-error')
        <div class="card-header">
            <div class="card-title mb-0">
                <span class="section-title">New Blog Form</span>
            </div>
        </div>
        <div class="card-body">
            <form  method ="POST" action="{{url('admin/posts/'.$post->id)}}" >
                @method('PUT')
                @csrf
                <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                <div class="row" >
                    <div class="col-md-10">
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Title</label>
                            <div class="col-lg-10">
                                <input id = "title" type="text" value="{{$post->title}}" name = "title"class="form-control" required autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Categories</label>
                            <div class="col-lg-10">
                                <select name="categories[]" id="categories-input" multiple class="form-control">
                                    @foreach($post->categories as $item)
                                        <option value="{{$item->name}}" selected>{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>                                
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Content</label>
                            <div class="col-lg-10">
                                <textarea id="body" name="body">{{$post->body}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label">
                                Cover Image
                            </label>
                            <div class="col-md-10">
                                <div id="cover" data-value="{{$post->media->id}}" input-field="media_id" class="w-100 btn btn-secondary">Set Cover Image</div>
                                <span id="cover-image">
                                    <img src="{{$post->media->link()}}" class="img-fluid w-100">
                                </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Tags</label>
                            <div class="col-lg-10">
                                <select name="tags[]" id="tags-input" multiple class="form-control">
                                    @foreach($post->tags as $item)
                                        <option value="{{$item->name}}" selected>{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>                                
                        </div>
                    </div>
                </div>
                <input type="hidden" name="user_id" value="1">
                <div class="row">
                    <div class="col-md-10">
                        <button type="submit" class="btn btn-success float-right">Update Blog</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection