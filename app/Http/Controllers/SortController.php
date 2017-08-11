<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;


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

class SortController extends Controller
{
    public function sortTitle(Request $request)
    {
      $user = Auth::user();
      $input = $request['title'];
      $books = $user->books;
      $books = $books->where('title', $input);
      $back = true;

      return view('account.dashboard.index', compact('user', 'books', 'back'));

    }
}
