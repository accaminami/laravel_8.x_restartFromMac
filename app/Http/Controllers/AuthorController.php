<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Http\Response as IlluminateResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use App\Models\Author;
use Illuminate\Support\Facades\DB;

use function response;
use function view;

class AuthorController extends Controller
{
    public function index()
    {

        DB::enableQueryLog();
        $authors = Author::find([1,3,5]);

        $queries = DB::getQueryLog();
        //print_r($authors);
        print_r($queries);

        DB::disableQueryLog();


        /*
        $sql = Author::where('name','=','minami')->toSql();
        echo $sql;
        */

        /*
        $author = Author::find(1);

        foreach ($author->books as $book) {
            echo $book->name;
        }
        */

        /*
        //$authors = Author::all();
        $authors = Author::withTrashed()->get();

        echo $authors->count() . "<BR>";
        echo "======================================<BR>";
        foreach($authors as $author){
            echo $author->name ;
            echo $author->kana . "<BR>";
        }
        echo "======================================<BR>";
        $authors = Author::onlyTrashed()->get();

        echo $authors->count() . "<BR>";
        echo "======================================<BR>";
        foreach($authors as $author){
            echo $author->name ;
            echo $author->kana . "<BR>";
        }
        echo "======================================<BR>";

        $filtered_authors = $authors->filter(
            function ($author){
                return $author->id < 5 ;
            }
        );
        foreach($filtered_authors as $author){
            echo $author->name . "<BR>";
        }
        echo "======================================<BR>";
        $authors = Author::find(3);
        echo $authors->name . "<BR>";
        echo "======================================<BR>";
        try {
            $authors = Author::findOrFail(4);
            echo $authors->name . "<BR>";
        } catch (ModelNotFoundException $e){
            echo "not found " ."<BR>";
        }
        echo "======================================<BR>";
        $authors = Author::whereName('江古田 さゆり')->get();
        foreach($authors as $author){
            echo $author->name . "<BR>";
        }
        echo "======================================<BR>";
        //Author::create([
        //    'name' => 'aaaaaaa',
        //    'kana' => 'bbbbbb',
        //    ]);
        echo "======================================<BR>";
        //$author = new Author();
        //$author->name = 'AAAAAAA';
        //$author->kana = 'BBBBBBB';
        //$author->save();
        echo "======================================<BR>";
        //$author = Author::find(1)->update(['name'=>'kenji']);
        echo "======================================<BR>";
        //$author = Author::find(2);
        //$author->name = 'kenken';
        //$author->kana = 'kenkenkana';
        //$author->save();
        echo "======================================<BR>";
        $author = Author::find(2);
        //$author->delete();
        echo "======================================<BR>";
        Author::destroy(1);
        //Author::destroy([1,4,5,10]);
        //Author::destroy([11,14,15,20]);
        echo "======================================<BR>";
        $authors = Author::where('id',17)->orWhere('id',16)->get();
        foreach($authors as $author){
            echo $author->name . "<BR>";
        }
        echo "======================================<BR>";
        $authors = Author::where('id', '>=', 0)->orderBy('id')->get();
        foreach($authors as $author){
            echo $author->name . "<BR>";
        }
        echo $authors->toJson() . "<BR>";
        echo "======================================<BR>";
        $author = Author::where('name','minami')->first();
        if (empty($author)){
            $author = Author::create(['name'=>'minami','kana'=>'minami']);
        }
        echo "======================================<BR>";
        $author = Author::firstOrCreate(['name'=>'minami123','kana'=>'minami123']);
        echo "======================================<BR>";
        $author = Author::firstOrNew(['name'=>'minami12345','kana'=>'minami12345']);
        $author->save();
        echo "======================================<BR>";
        */
    }
}
