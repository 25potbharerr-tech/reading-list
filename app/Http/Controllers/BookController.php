<?php

namespace App\Http\Controllers;
use App\Models\Book;

use Illuminate\Http\Request;

class BookController extends Controller
{
public function index(Request $request)
{
    $status = $request->query('status');
    $search = $request->query('search');

    $query = Book::query();

    if (in_array($status, ['to-read', 'reading', 'finished'])) {
        $query->where('status', $status);
    }

    if ($search) {
        $query->where(function ($q) use ($search) {
            $q->where('title', 'like', "%{$search}%")
              ->orWhere('author', 'like', "%{$search}%");
        });
    }

    $books = $query->get();

    return view('books.index', compact('books', 'status', 'search'));
}  

    

    
public function create()
{
    return view('books.create');
}
public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'author' => 'required|string|max:255',
        'status' => 'required|in:to-read,reading,finished',
    ]);

    Book::create($validated);
return redirect()->route('books.index')
    ->with('success', 'Book added successfully!');
}
    /**
     * Store a newly created resource in storage.
    

    
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
{
    return view('books.edit', compact('book'));
}

public function update(Request $request, Book $book)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'author' => 'required|string|max:255',
        'status' => 'required|in:to-read,reading,finished',
    ]);

    $book->update($validated);

   return redirect()->route('books.index')
    ->with('success', 'Book updated successfully!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
{
    $book->delete();

    return redirect()->route('books.index')
        ->with('success', 'Book deleted successfully!');
}
}