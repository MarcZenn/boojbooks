<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

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

class UserDashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
      $user = User::findOrFail($id);
      $books = $user->books;
      $back = false;

      return view('account.dashboard.index', compact('user', 'books', 'back'));
    }
}
