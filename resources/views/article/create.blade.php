@extends('layouts.app')

@section('content')
    <main role="main" class="container">
        <div class="row">
            <div class="col-md-8 blog-main">
                <h3 class="pb-4 mb-4 font-italic border-bottom">
                    Create a New Article
                </h3>

                <div class="blog-post">
                    <form action="{{ url('articles') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>headline</label>
                            <input type="text" name="headline" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Author</label>
                            <input type="text" name="author" class="form-control" required>
                        </div>
                        <label>Sub-Category</label>
                        <select class="custom-select custom-select-lg mb-3"  name="sub_category_id" required>
                            <option selected>Select a Sub-Category</option>
                            @foreach($subCategories as $subCategory)
                                <option value="{{ $subCategory->id }}">{{ $subCategory->title }}</option>
                            @endforeach
                        </select>
                        <div class="form-group">
                            <label>description</label>
                            <textarea class="form-control" name="description" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Content</label>
                            <textarea class="form-control" name="copy" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                    @include('components.error')

                </div>

            </div><!-- /.blog-main -->
            <sidebar-component></sidebar-component>
            {{--            @include('components.aside')--}}

        </div><!-- /.row -->

    </main><!-- /.container -->
@endsection
