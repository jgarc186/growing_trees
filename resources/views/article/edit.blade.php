@extends('layouts.app')

@section('content')
    <main role="main" class="container">
        <div class="row">
            <div class="col-md-8 blog-main">
                <h3 class="pb-4 mb-4 font-italic border-bottom">
                    Edit {{ $article->title }}
                </h3>

                <div class="blog-post">
                    <form action="{{ url('articles/' . $article->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" value="{{$article->title}}" required>
                        </div>
                        <div class="form-group">
                            <label>headline</label>
                            <input type="text" name="headline" class="form-control" value="{{$article->headline}}" required>
                        </div>
                        <div class="form-group">
                            <label>Author</label>
                            <input type="text" name="author" class="form-control" value="{{$article->author}}" required>
                        </div>
                        <label>Sub-Category</label>
                        <select class="custom-select custom-select-lg mb-3"  name="sub_category_id" required>
                            <option value="{{ $subcategory->id }}" selected>{{$subcategory->headline}}</option>
                            @foreach($subcategories as $subCategory)
                                @if ($subCategory->id != $article->sub_category_id)
                                    <option value="{{ $subCategory->id }}">{{ $subCategory->title }}</option>
                                @endif
                            @endforeach
                        </select>
                        <div class="form-group">
                            <label>description</label>
                            <textarea class="form-control" name="description" rows="3" required>{{ $article->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Content</label>
                            <textarea class="form-control" name="copy" rows="3" required>{{ $article->copy }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                    @include('components.error')

                </div>

            </div><!-- /.blog-main -->

            {{--            @include('components.aside')--}}

        </div><!-- /.row -->

    </main><!-- /.container -->
@endsection
