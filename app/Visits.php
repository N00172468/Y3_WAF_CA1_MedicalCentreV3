<?php
# @Author: John Carlo M. Ramos
# @Date:   2019-11-11T18:02:08+00:00
# @Email:  !!!!!---CTRL + ALT + C = Colour Picker---!!!!!
# @Last modified by:   John Carlo M. Ramos
# @Last modified time: 2019-11-12T12:29:22+00:00




namespace App;

use Illuminate\Database\Eloquent\Model;

class Visits extends Model
{
    public function doctor() {
      return $this->belongsTo('App\Doctor');
    }

    public function patient() {
      return $this->belongsTo('App\Patient');
    }
}
