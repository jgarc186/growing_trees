@extends('layouts.app')

@section('content')
    <main role="main" class="container">
        <div class="row">
            <div class="col-md-8 blog-main">
                <h3 class="pb-4 mb-4 font-italic border-bottom">
                    SubCategories of {{ $category['title'] }}
                </h3>

                <div class="blog-post">
                    @foreach ($contents as $subcategory)
                        <a href="/subcategories/{{ $subcategory['subcategory']->id }}/edit">Edit {{ $subcategory['subcategory']->headline }}</a>
                        <h2 class="blog-post-title">{{ $subcategory['subcategory']->headline }}</h2>
                        @foreach($subcategory['articles'] as $article)
                            <a href="{{ url("articles/" . $article->id) }}">
                                <h4>{{ $article->title }}</h4>
                            </a>
                            <p>{{ $article->description }}</p>
                        @endforeach
                    @endforeach
                </div>

            </div><!-- /.blog-main -->

{{--            @include('components.aside')--}}

        </div><!-- /.row -->

    </main><!-- /.container -->
@endsection
