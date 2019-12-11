@extends('layouts.app')

@section('content')
    <main role="main" class="container">
        <div class="row">
            <div class="col-md-8 blog-main">
                <h3 class="pb-4 mb-4 font-italic border-bottom">
                    Edit the Sub-Category |  {{ $subcategory[0]->headline }}
                </h3>
                <div class="blog-post">
                    <form action="/subcategories/{{ $subcategory[0]->id }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" value="{{ $subcategory[0]->title }}" required>
                        </div>
                        <div class="form-group">
                            <label>headline</label>
                            <input type="text" name="headline" class="form-control" value="{{ $subcategory[0]->headline }}"   required>
                        </div>
                        <label>Category</label>
                        <select class="custom-select custom-select-lg mb-3"  name="category_id" required>
                            <option value="{{ $selectedCategory[0]->id }}" selected>{{ $selectedCategory[0]->headline }}</option>
                            @foreach($categories as $category)
                                @if ($category->id != $selectedCategory[0]->id)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endif
                            @endforeach
                        </select>
                        <div class="form-group">
                            <label>description</label>
                            <textarea class="form-control" name="description" rows="3" value="{{ $subcategory[0]->description }}"  required></textarea>
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
