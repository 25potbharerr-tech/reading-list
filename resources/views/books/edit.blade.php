<!DOCTYPE html>
<html>
<head>
    <title>Edit Book</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-8">

    <h1 class="text-3xl font-bold mb-6">Edit Book</h1>

    <form action="{{ route('books.update', $book->id) }}" method="POST"
          class="bg-white p-6 rounded shadow max-w-lg">

        @csrf
        @method('PUT')
        @if ($errors->any())
    <div class="bg-red-100 text-red-700 p-3 mb-4 rounded">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

        <label class="block mb-2">Book Title</label>
        <input type="text" name="title"
               value="{{ old('title', $book->title) }}"
               class="border p-2 w-full mb-4">

        <label class="block mb-2">Author</label>
        <input type="text" name="author"
               value="{{ old('author', $book->author) }}"
               class="border p-2 w-full mb-4">

        <label class="block mb-2">Status</label>
        <select name="status" class="border p-2 w-full mb-4">

            <option value="to-read"
                {{ old('status', $book->status) == 'to-read' ? 'selected' : '' }}>
                To Read
            </option>

            <option value="reading"
                {{ old('status', $book->status) == 'reading' ? 'selected' : '' }}>
                Reading
            </option>

            <option value="finished"
                {{ old('status', $book->status) == 'finished' ? 'selected' : '' }}>
                Finished
            </option>

        </select>

        <button type="submit"
                class="bg-blue-500 text-white px-4 py-2 rounded">
            Update Book
        </button>

    </form>

</body>
</html>