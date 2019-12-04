<?php
# @Author: John Carlo M. Ramos
# @Date:   2019-11-11T18:29:08+00:00
# @Email:  !!!!!---CTRL + ALT + C = Colour Picker---!!!!!
# @Last modified by:   John Carlo M. Ramos
# @Last modified time: 2019-11-11T20:20:41+00:00




namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Visits;

class VisitController extends Controller
{
  // Authentiction Function:
  public function __construct()
  {
      $this->middleware('auth');
      // $this->middleware('role:user');
  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //->paginate(5);
      $visits = Visits::all();

      return view('patient.visits.index')->with([
        'visits' => $visits
      ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $visit = Visits::findOrFail($id);

      return view('patient.visits.show')->with([
        'visit' => $visit
      ]);
    }

    /**
     * Cancel the Visit
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cancel($id) {
        $visit = Visits::findOrFail($id);
        $visit->cancelled = true;
        $visit->save();

        return redirect()->route('patient.visits.index', $visit->id);
    }
}
