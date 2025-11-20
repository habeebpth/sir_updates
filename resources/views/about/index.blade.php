@extends('layouts.wrapper', ['title' => 'About'])

@section('content')
    <div class="container-lg mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="p-3 p-md-3 rounded text-body-emphasis bg-body-secondary">
                    <div class="card-body p-5">
                        <!-- Author Image -->
                        <div class="text-center mb-4">
                            <i class="bi bi-person-circle fs-2 text-muted"></i>
                        </div>

                        <!-- Header -->
                        <div class="text-center mb-5">
                            <h2 style="font-family: 'Playfair Display', serif;">About</h2>
                                <p class="lead text-muted">Get to know the team behind the posts</p>
                        </div>

                        <!-- Author Bio -->
                        <p class="text-muted text-center mb-4">
                            sirupdates.com
                        </p>
                    </div>
                </div>
            </div>
        </div>
@endsection