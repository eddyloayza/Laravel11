<x-layout meta-title="Blog title" meta-description="Blog description">

    <h1>Blog</h1>

    <a href="{{ route('posts.create') }}">Create new post</a>

    @foreach ($posts as $post)
        <h2>
            <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a> - <a href="{{ route('posts.edit', $post) }}">Edit</a>
            -
            <form method="POST" action="{{ route('posts.destroy', $post) }}">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </h2>

    @endforeach

</x-layout>
