<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $books=Book::latest()->paginate(4);
        return view('welcome')->with('books',$books);
    }
    public function viewCategory($id)
    {
        $category=Category::find($id);
        $books=$category->books;
        return view('viewcategory')->with(['books'=>$books,'category'=>$category]);
    }
    public function viewBook($id)
    {
        $book=Book::find($id);
        return view('book')->with('book',$book);
    }
    public function addcomment(Request $request , $id)
    {
        $this->validate($request,[
           'comment'=>'required'
        ]);
        $book= Book::findOrFail($id);
        $comment= new Comment();
        $comment->user_id =auth()->user()->id;
        $comment->book_id =$book->id;
        $comment->comment =$request->input('comment');
        $comment->save();
        return redirect()->back();
    }
}
