<?php
# @Author: John Carlo M. Ramos
# @Date:   2019-11-17T16:36:57+00:00
# @Email:  !!!!!---CTRL + ALT + C = Colour Picker---!!!!!
# @Last modified by:   John Carlo M. Ramos
# @Last modified time: 2019-11-17T16:48:53+00:00




namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
  public function user() {
    return $this->belongsTo('App\User');
  }
}
