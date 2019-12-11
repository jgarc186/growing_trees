@extends('layouts.app')

@section('content')
    <main role="main" class="container">
        <div class="row">
            <div class="col-md-8 blog-main">
                <h3 class="pb-4 mb-4 font-italic border-bottom">
                    {{ $article['headline'] }}
                </h3>

                <div class="blog-post">
                    <p class="blog-post-meta">Author: {{ $article['author'] }}</p>
                    <p>
                        {{ $article['copy'] }}
                    </p>
                </div>

            </div><!-- /.blog-main -->

            {{--            @include('components.aside')--}}

        </div><!-- /.row -->

    </main><!-- /.container -->
@endsection
