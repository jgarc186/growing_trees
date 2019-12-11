@extends('layouts.app')

@section('content')
    <main role="main" class="container">
        <div class="row">
            <div class="col-md-8 blog-main">

                @include('components.success')

                <h3 class="pb-4 mb-4 font-italic border-bottom">
                    Category
                </h3>

                <div class="blog-post">
                    @foreach ($categories as $category)
                        @if ($category->id == 1)
                            <a href="{{ url('categories/' . $category['id']) }}">
                                <h2 class="blog-post-title">{{ $category['headline'] }}</h2>
                            </a>
                        @endif
                    @endforeach
                </div>

            </div><!-- /.blog-main -->

        @include('components.aside')
            <div>
                Create
                <ul>
                    <li><a href="{{ url('categories/create') }}">Category</a></li>
                    <li><a href="{{ url('subcategories/create') }}">Subcategory</a></li>
                    <li><a href="{{ url('articles/create') }}">Article</a></li>
                </ul>
            </div>

        </div><!-- /.row -->

    </main><!-- /.container -->
@endsection
