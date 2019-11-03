<?php
# @Author: John Carlo M. Ramos
# @Date:   2019-11-03T16:45:48+00:00
# @Email:  !!!!!---CTRL + ALT + C = Colour Picker---!!!!!
# @Last modified by:   John Carlo M. Ramos
# @Last modified time: 2019-11-03T17:41:33+00:00




namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
  // Many-to-Many Relationship between Roles and Users:
  public function roles()
  {
    return $this->belongsToMany('App\User', 'user_role');
  }
}
