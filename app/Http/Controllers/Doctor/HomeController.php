<?php
# @Author: John Carlo M. Ramos
# @Date:   2019-11-03T18:58:13+00:00
# @Email:  !!!!!---CTRL + ALT + C = Colour Picker---!!!!!
# @Last modified by:   John Carlo M. Ramos
# @Last modified time: 2019-11-03T19:12:08+00:00




namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('role:doctor');
  }

  public function index()
  {
    return view('doctor.home');
  }
}
