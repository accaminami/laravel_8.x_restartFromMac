<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Http\Response as IlluminateResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use App\Models\Book;
use Illuminate\Support\Facades\DB;

use function response;
use function view;

class BookController extends Controller
{
    public function index()
    {

//        $sql = <<<EOF
//            SELECT
//                bookdetails.isbn,
//                books.name
//            FROM
//                books
//            LEFT JOIN bookdetails ON books.id = bookdetails.book_id
//            WHERE bookdetails.price >= ? AND bookdetails.published_date >= ?
//            ORDER BY bookdetails.published_date DESC
//        EOF;
        $sql = <<<EOF
            SELECT
                *
            FROM
                books
        EOF;
        $result = DB::select($sql);
        //$result = DB::select($sql, ['1000', '2021-01-01']);

        foreach($result as $book)
        {
            echo $book->name . " ";
            echo $book->id . "\n";
        }

        /*
        DB::table('books')
            ->where('id', '=', 20)
            ->update(['name'=>'minami'])
            ;
        */

        /*
        $result = DB::table('books')
            ->select('id', 'name')
            ->get();

        $result_count = DB::table('books')
            ->select('id', 'name')
            ->count();
        */

        /*
        ->leftJoin('authors', 'books.author_id',  '=',  'authors.id')
        ->leftJoin('publishers', 'books.publisher_id', '=', 'publishers.id')
        ->get();
        */
        /*
        ->orderBy('id' , 'desc')
        ->get();
        */
        /*
        ->select('id', 'name as title')
        ->where('id','>',5)
        ->where('created_at','>','2021-07-21')
        ->get();
        */
        /*
        ->select('id', 'name as title')
        ->limit(10)
        ->offset(6)
        ->get();
        */

        //print_r($result);

        //print($result_count);
        //echo "\n";
        //echo "\n";
        //foreach($result as $val)
        //{
        //    echo $val->id . " ";
        //    echo $val->name . "\n";
        //}
    }
//    public function index()
//    {
//        $book = Book::find(1);
//        echo $book->detail->isbn;
//        echo "======================================<BR>";
//    }
}
