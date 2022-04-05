<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function index()
    {
        return view('upload');
    }
    public function upload(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'author'=>'required',
            'info'=>'required',
            'image'=>'required|image',
            'book'=>'required|mimes:pdf',
        ]);
        if($request->hasFile('image'))
        {
            $imageExt= $request->file('image')->getClientOriginalExtension();
            $imageName= time().'thumnnail.'.$imageExt;
            $request->file('image')->storeAs('public/thumbnails',$imageName);
        }
        if($request->hasFile('book'))
        {
            $bookExt= $request->file('book')->getClientOriginalExtension();
            $bookName= time().'book.'.$bookExt;
            $request->file('book')->storeAs('public/books',$bookName);
        }
        $book=new Book();
        $book->title=$request->input('title');
        $book->author=$request->input('author');
        $book->image=$imageName;
        $book->bookfile=$bookName;
        $book->info=$request->input('info');
        $book->user_id =Auth::user()->id;
        $book->category_id =$request->input('category');
        $book->save();
        return redirect(route('upload'))->with('message','Upload OK');
    }
}
