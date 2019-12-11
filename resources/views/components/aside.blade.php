<aside class="col-md-4 blog-sidebar">
    <div class="p-4">
        <h4 class="font-italic">More Categories</h4>
        <ol class="list-unstyled mb-0">
            @foreach ($categories as $category)
                @if ($category->id != 1)
                    <li><a href="{{ url('categories/' . $category['id']) }}">{{ $category['headline'] }}</a></li>
                @endif
            @endforeach
        </ol>
    </div>
</aside>
