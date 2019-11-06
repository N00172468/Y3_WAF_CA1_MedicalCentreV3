<?php
# @Author: John Carlo M. Ramos
# @Date:   2019-11-03T16:41:23+00:00
# @Email:  !!!!!---CTRL + ALT + C = Colour Picker---!!!!!
# @Last modified by:   John Carlo M. Ramos
# @Last modified time: 2019-11-06T16:44:19+00:00




namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
      $user = $request->user();
      $home = 'patient.home';

      if ($user->hasRole('admin')) {
        $home = 'admin.home';
      } else if ($user->hasRole('doctor')) {
        $home = 'doctor.home';
      } else {
        $home = 'patient.home';
      }

      return redirect()->route($home);
    }
}
