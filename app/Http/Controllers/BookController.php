<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Http\Response as IlluminateResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use App\Models\Book;

use function response;
use function view;

class BookController extends Controller
{
    public function index()
    {
        $book = Book::find(1);
        echo $book->detail->isbn;
        echo "======================================<BR>";
    }
}
