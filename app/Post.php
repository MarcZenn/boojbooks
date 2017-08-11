<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/*
|--------------------------------------------------------------------------
| Posts Table Model
|--------------------------------------------------------------------------
|
| Here is where you can register all of the model methods for the 'posts'.
| table. By default the model will assume that the table has a row named
| 'id'. If you've changed the name of your primary id column, you can tell
|  Laravel to recognize that name instead by declaring:
|
|  protected $primaryKey = 'primary_id'
|
*/
class Post extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
   protected $fillable = [
       'title', 'summary'
   ];
}
