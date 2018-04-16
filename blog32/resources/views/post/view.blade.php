@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">   
        <div class="col-md-12 col-md-offset-4">
            <div class="card">
                <div class="card-header">
                <h1>{{ $post->title }} | <small>{{$post->category->name}}</small></h1>   
                </div>

                <div class="card-body">
                    <p>{{  $post->content }}</p>
                </div>
            </div>

            <div class="card">
               <div class="card-header">
                   <h4>Comments</h4>
               </div>
                @foreach ($post->comment()->get() as $comment)
                    <div class="card-header">
                            <h5>Commented by {{ $comment->user->name }} - {{$comment->created_at->diffforHumans()}}</h5>
                    </div>
                    <div class="card-body">
                    <p>{{ $comment->message }}</p>
                    </div>

                @endforeach
            </div>
        </div>

        <div class="col-md-12 col-md-offset-4">
            <div class="card-header">
                Comment this Post
            </div>
            <div class="card-body">
                <form action="{{ route('comment.store', $post)}}" method="post" class="form horizontal">
                    {{csrf_field()}}
                    <div class="form-group">
                        <textarea id="" cols="145" rows="5" class="form-control" name="message" placeholder="Insert your Comment"></textarea>
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Submit" class="btn btn-primary">
                    </div>
                    </form>
            </div>
        </div>
    </div>
</div>

@endsection