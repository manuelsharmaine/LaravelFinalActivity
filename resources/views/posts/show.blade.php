@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">       
                <div class="card-body">

                    <a  href="/posts/{{$post->id}}/edit" class="btn btn-warning"> Edit </a> 
                        <br>
                        Title: {{ $post->title }} <br>
                        Description: {{ $post->description }} <br>
                        Created At: {{ $post->created_at->diffForHumans() }}  <br>
                        @if ($post->img != '')
                         Image: 
                        <img src="{{ asset('/storage/img/'.$post->img) }}">
                        @endif
                        
                        @include('/posts/comments')
                        <h4>Share Post</h4>
                        <form method="post" action="{{ route('post.share', $post) }}">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="email" class="form-control" />
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-warning" value="Share" />
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection