<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;

class StaticController extends Controller
{

  /**
   * Show the home page.
   *
   *
   */
    public function welcome()
    {
      return view('welcome', compact('users'));
    }

    /**
     * Show the about us page.
     *
     *
     */
    public function about()
    {
      return view('static.about');
    }
}
