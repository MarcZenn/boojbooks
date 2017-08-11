<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/*
|--------------------------------------------------------------------------
| Books Table Model
|--------------------------------------------------------------------------
|
| Here is where you can register all of the model methods for the 'books'.
| table. By default the model will assume that the table has a row named
| 'id'. If you've changed the name of your primary id column, you can tell
| Laravel to recognize that name instead by declaring:
|
|  protected $primaryKey = 'primary_id'
|
*/
class Book extends Model
{
  /**
   * Soft Deletion/Trashing
   *
   *
   */
  use SoftDeletes;

  protected $dates = ['deleted_at'];

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
   protected $fillable = [
       'title', 'summary', 'author', 'path', 'pub_date'
   ];

   /**
    * Attribute accessors
    *
    *
    */
    public function getNameAttribute($value)
    {
      return ucfirst($value);
    }

    /**
     * Attribute mutators
     *
     *
     */
     public function setNameAttribute($value)
     {
       $this->attributes['name'] = ucfirst($value);
     }

     public function user()
     {
       return $this->belongsTo('App\User');
     }

}
