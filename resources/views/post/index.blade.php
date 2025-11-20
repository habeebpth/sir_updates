@extends('layouts.wrapper', ['title' => 'SIR Updates'])

@section('content')
    <div class="container-lg">

        @include('post.index.latest_posts')
        @include('post.index.liked_posts')

    </div>
@endsection
