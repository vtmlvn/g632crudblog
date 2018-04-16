@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">
        @foreach ($posts as $post)
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('post.view', $post) }}" class=""> {{ $post->title }}  </a>  {{$post->created_at->diffforHumans()}}
                        <div class="pull-right">
                            <a href="{{ route('post.edit', $post) }}" class="btn btn-secondary btn-sm float-right"> Edit </a>
                            <form class="" action="{{ route('post.destroy', $post) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE')}}
                                <button class="btn btn-secondary btn-sm btn-danger float-right">Delete</button>
                            </form>
                        </div>
                    </div>

                    <div class="card-body">
                        <p>{{  str_limit($post->content, 100, ' ...') }}</p>
                    </div>
                </div>
            @endforeach

            {!! $posts->render() !!}
        </div>
    </div>
</div>    
@endsection