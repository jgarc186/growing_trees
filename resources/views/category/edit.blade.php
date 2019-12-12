@extends('layouts.app')

@section('content')
    <main role="main" class="container">
        <div class="row">
            <div class="col-md-8 blog-main">
                <h3 class="pb-4 mb-4 font-italic border-bottom">
                    Edit {{ $category->title }} Category
                </h3>

                <div class="blog-post">
                    <form action="{{ url('categories/' . $category->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" value="{{ $category->title }}" required>
                        </div>
                        <div class="form-group">
                            <label>headline</label>
                            <input type="text" name="headline" class="form-control" value="{{ $category->headline }}" required>
                        </div>
                        <div class="form-group">
                            <label>description</label>
                            <textarea class="form-control" name="description" rows="3" required>{{ $category->description }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                    @include('components.error')

                </div>

            </div><!-- /.blog-main -->

            {{--            @include('components.aside')--}}
            <sidebar-component></sidebar-component>
        </div><!-- /.row -->

    </main><!-- /.container -->
@endsection
