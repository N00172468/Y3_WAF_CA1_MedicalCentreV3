<?php
# @Author: John Carlo M. Ramos
# @Date:   2019-11-03T18:58:03+00:00
# @Email:  !!!!!---CTRL + ALT + C = Colour Picker---!!!!!
# @Last modified by:   John Carlo M. Ramos
# @Last modified time: 2019-11-03T19:02:48+00:00




namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('role:patient');
  }

  public function index()
  {
    return view('patient.home');
  }
}
