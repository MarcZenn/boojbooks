<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CreatePostRequest;

/*
|--------------------------------------------------------------------------
| Model Class Imports
|--------------------------------------------------------------------------
|
| Eloquent ORM
|
*/
use App\User;
use App\Book;
use App\Role;

class BooksController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      //
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Illuminate\Http\Request\CreatePostRequest
   * @return \Illuminate\Http\Response
   */
  public function store(CreatePostRequest $request)
  {
      $user = User::findOrFail($request->id);
      $image = $request->file('image');
      $book = new Book;
      if($image) {
        $image->move(public_path('images'), $image->getClientOriginalName());
        $book->path = $image->getClientOriginalName();;
      };
      $book->title = $request->title;
      $book->author = $request->author;
      $book->summary = $request->summary;
      $book->pub_date = $request->pub_date;
      $user->books()->save($book);

      return redirect()->back();
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
      $book = Book::findOrFail($id);

      return view('account.dashboard.bookdetails', compact('book'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $book = Book::findOrFail($id);

    return view('account.dashboard.editbookdetails', compact('book'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request\CreatePostRequest // validation check
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(CreatePostRequest $request, $id)
  {
      $book = Book::findOrFail($id);
      $user = $book->user; // inverse onToMany via foreign key. Check Book model.
      $image = $request->file('image');
      if($image) {
        $image->move(public_path('images'), $image->getClientOriginalName());
        $book->path = $image->getClientOriginalName();;
      };
      $book->title = $request->title;
      $book->author = $request->author;
      $book->summary = $request->summary;
      $book->pub_date = $request->pub_date;
      $book->save();

      return redirect()->action('UserDashController@index', ['id' => $user->id]);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
      $book = Book::findOrFail($id);

      $book->delete();

      return redirect()->back();
  }
}
