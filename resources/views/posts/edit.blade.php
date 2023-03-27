@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-header">{{ __('Edit Post') }}</div>
            <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
            </div>
            <form method="post" action="{{route('post.update', $post->id)}}">
                @csrf
                <div class="form-group">
                    <label>Post Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Enter Post Title" require>
                </div>
                <div class="form-group">
                    <label>Post Description</label>
                    <textarea class="form-control" name="description" placeholder="Enter Post description" row="10" require></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>

    </div>
</div>

@endsection