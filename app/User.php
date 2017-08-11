<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

/*
|--------------------------------------------------------------------------
| Users Table Model
|--------------------------------------------------------------------------
|
| Here is where you can register all of the model methods for the 'users'.
| table. By default the model will assume that the table has a column named
| 'id'. If you've changed the name of your primary id column, you can tell
| Laravel to recognize that name instead by declaring:
|
|  protected $primaryKey = 'primary_id'
|
*/
class User extends Authenticatable
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
      'name', 'email', 'password',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
      'password', 'remember_token',
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

    /**
     * Query Scopes
     *
     *
     */
     public static function scopeLatest($query)
     {
       return $query->orderBy('id', 'desc');
     }

      public function books()
      {
       return $this->hasMany('App\Book')->latest();
      }

      public function roles()
      {
        return $this->belongsToMany('App\Role');
      }

}
