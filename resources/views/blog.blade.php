<x-header>
</x-header>

@foreach($posts as $post)
    <x-blog-post :post="$post"></x-blog-post>
@endforeach
