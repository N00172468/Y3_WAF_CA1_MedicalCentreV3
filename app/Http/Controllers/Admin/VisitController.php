<?php
# @Author: John Carlo M. Ramos
# @Date:   2019-11-11T18:28:09+00:00
# @Email:  !!!!!---CTRL + ALT + C = Colour Picker---!!!!!
# @Last modified by:   John Carlo M. Ramos
# @Last modified time: 2019-11-11T20:08:17+00:00




namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Visits;
use App\Doctor;
use App\Patient;

class VisitController extends Controller
{

  // Authentication Function:
  public function __construct()
  {
    $this->middleware('auth');
    $this->middleware('role:admin');
  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $visits = Visits::all();

      return view('admin.visits.index')->with([
        'visits' => $visits
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doctors = Doctor::all();
        $patients = Patient::all();

        return view('admin.visits.create')->with([
          'doctors' => $doctors,
          'patients' => $patients
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
        'date' => 'required',
        'doctor_id' => 'required|integer',
        'patient_id' => 'required|integer',
        'time_start' => 'required|max:191',
        'time_end' => 'required|max:191',
        'duration_of_visit' => 'required|numeric|min:0',
        'cost_of_visit' => 'required|numeric|min:0'
      ]);

      $visit = new Visits();
      $visit->date = $request->input('date');
      $visit->doctor_id = $request->input('doctor_id');
      $visit->patient_id = $request->input('patient_id');
      $visit->time_start = $request->input('time_start');
      $visit->time_end = $request->input('time_end');
      $visit->duration_of_visit = $request->input('duration_of_visit');
      $visit->cost_of_visit = $request->input('cost_of_visit');

      $visit->save();

      return redirect()->route('admin.visits.index');
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

      return view('admin.visits.show')->with([
        'visit' => $visit
      ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $visit = Visits::findOrFail($id);
      $doctors = Doctor::all();
      $patients = Patient::all();

      return view('admin.visits.edit')->with([
        'visit' => $visit,
        'doctors' => $doctors,
        'patients' => $patients
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $visit = Visits::findOrFail($id);

      $request->validate([
        'date' => 'required|date',
        'doctor_id' => 'required|integer',
        'patient_id' => 'required|integer',
        'time_start' => 'required|max:191',
        'time_end' => 'required|max:191',
        'duration_of_visit' => 'required|numeric|min:0',
        'cost_of_visit' => 'required|numeric|min:0'
      ]);

      $visit->date = $request->input('date');
      $visit->doctor_id = $request->input('doctor_id');
      $visit->patient_id = $request->input('patient_id');
      $visit->time_start = $request->input('time_start');
      $visit->time_end = $request->input('time_end');
      $visit->duration_of_visit = $request->input('duration_of_visit');
      $visit->cost_of_visit = $request->input('cost_of_visit');

      $visit->save();

      return redirect()->route('admin.visits.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $visit = Visits::findOrFail($id);

      $visit->delete();

      return redirect()->route('admin.visits.index');
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

        return redirect()->route('admin.visits.index', $visit->id);
    }
}
