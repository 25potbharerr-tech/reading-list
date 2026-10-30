<?php

namespace App\Http\Controllers;
use App\Models\Book;

use Illuminate\Http\Request;

class BookController extends Controller
{
   public function index()
{
    $books = Book::all();

    return view('books.index', compact('books'));
}
    
    
        //
    }

    /**
     * Show the form for creating a new resource.
     */
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

    return redirect()->route('books.index');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
