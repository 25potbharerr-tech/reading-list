<!DOCTYPE html>
<html>
<head>
    <title>My Reading List</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-8">

    <h1 class="text-3xl font-bold mb-6">My Reading List</h1>

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

                    <p>Status: {{ $book->status }}</p>

                    <a href="{{ route('books.edit', $book->id) }}"
                       class="bg-yellow-500 text-white px-3 py-1 rounded">
                        Edit
                    </a>

                </div>

            @endforeach

        @endif

    </div>

</body>
</html>