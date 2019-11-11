<?php
# @Author: John Carlo M. Ramos
# @Date:   2019-11-11T17:07:39+00:00
# @Email:  !!!!!---CTRL + ALT + C = Colour Picker---!!!!!
# @Last modified by:   John Carlo M. Ramos
# @Last modified time: 2019-11-11T17:17:05+00:00




namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
  public function welcome() {
    return view('welcome');
  }

  public function about() {
    return view('about');
  }
}
