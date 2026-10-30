<!DOCTYPE html>
<html>
<head>
    <title>My Reading List</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-8">

    <h1 class="text-3xl font-bold mb-6">My Reading List</h1>
    <form action="{{ route('books.index') }}" method="GET"
      class="mb-6 flex gap-2">

    <input
        type="text"
        name="search"
        value="{{ request('search') }}"
        placeholder="Search by book title or author..."
        class="border p-2 rounded w-80">

    <button type="submit"
            class="bg-blue-500 text-white px-4 py-2 rounded">
        Search
    </button>

    <a href="{{ route('books.index') }}"
       class="bg-gray-500 text-white px-4 py-2 rounded">
        Clear
    </a>

</form>
    @if(session('success'))
    <div class="bg-green-100 text-green-700 p-3 mb-4 rounded">
        {{ session('success') }}
    </div>
@endif
    <div class="flex gap-3 mb-6">

    <a href="{{ route('books.index') }}"
       class="bg-gray-500 text-white px-3 py-2 rounded">
        All Books
    </a>

    <a href="{{ route('books.index', ['status' => 'to-read']) }}"
       class="bg-blue-500 text-white px-3 py-2 rounded">
        To Read
    </a>

    <a href="{{ route('books.index', ['status' => 'reading']) }}"
       class="bg-yellow-500 text-white px-3 py-2 rounded">
        Reading
    </a>

    <a href="{{ route('books.index', ['status' => 'finished']) }}"
       class="bg-green-500 text-white px-3 py-2 rounded">
        Finished
    </a>

</div>

    <a href="{{ route('books.create') }}"
       class="bg-green-500 text-white px-4 py-2 rounded">
        Add New Book
    </a>

    <div class="mt-6">

        @if($books->isEmpty())

            <p>No books added yet.</p>

        @else

            @foreach($books as $book)

                <div class="bg-white p-4 mb-4 rounded shadow">

                    <h2 class="text-xl font-bold">
                        {{ $book->title }}
                    </h2>

                    <p>Author: {{ $book->author }}</p>

                    <p class="mt-2">
    Status:

    @if($book->status == 'to-read')
        <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full">
            To Read
        </span>

    @elseif($book->status == 'reading')
        <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full">
            Reading
        </span>

    @elseif($book->status == 'finished')
        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full">
            Finished
        </span>
    @endif
</p>

                    <a href="{{ route('books.edit', $book->id) }}"
                       class="bg-yellow-500 text-white px-3 py-1 rounded">
                        Edit
                        <form action="{{ route('books.destroy', $book->id) }}"
      method="POST"
      onsubmit="return confirm('Are you sure you want to delete this book?')">

    @csrf
    @method('DELETE')

    <button type="submit"
            class="bg-red-500 text-white px-3 py-1 rounded">
        Delete
    </button>

</form>
                    </a>

                </div>

            @endforeach

        @endif

    </div>

</body>
</html>