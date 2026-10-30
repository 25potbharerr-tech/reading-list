public function index()
{
    $books = Book::all();

    return view('books.index', compact('books'));
}