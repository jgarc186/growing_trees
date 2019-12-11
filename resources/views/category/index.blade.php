@extends('layouts.app')

@section('content')
    <main role="main" class="container">
        <div class="row">
            <div class="col-md-8 blog-main">
                <h3 class="pb-4 mb-4 font-italic border-bottom">
                    {{ $category['title'] }}
                </h3>
                <a href="{{ url('categories/' . $category['id'] . '/edit') }}">Edit</a>

                <div class="blog-post">
                    @foreach ($contents as $subcategory)
                        <a href="{{ url('subcategories/' . $subcategory['subcategory']->id . '/edit') }}">Edit {{ $subcategory['subcategory']->headline }}</a>
                        <form action="{{ url('subcategories/' . $subcategory['subcategory']->id ) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                        <h2 class="blog-post-title">{{ $subcategory['subcategory']->headline }}</h2>
                        @foreach($subcategory['articles'] as $article)
                            <a href="{{ url("articles/" . $article->id) }}">
                                <h4>{{ $article->title }}</h4>
                            </a>
                            <a href="{{ url('articles/' . $article->id . '/edit') }}">Edit</a>
                            <form action="{{ url('articles/' . $article->id ) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                            <p>{{ $article->description }}</p>
                        @endforeach
                    @endforeach
                </div>

            </div><!-- /.blog-main -->

{{--            @include('components.aside')--}}

        </div><!-- /.row -->

    </main><!-- /.container -->
@endsection
