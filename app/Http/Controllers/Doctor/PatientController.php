<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Patient;
use App\User;
use App\Role;
use App\Visit;

class PatientController extends Controller
{
  public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:doctor');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $patients = Patient::all();

      return view('doctor.patients.index')->with([
        'patients' => $patients
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('doctor.patients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $role_patient = Role::where('name', 'patient')->first();

      $request->validate([
        'name' => 'required|max:191',
        'address' => 'required|max:191',
        'phone' => 'required|max:191',
        'email' => 'required|max:191',
        // 'health_insurance' => 'required',
        'policy_no' => 'max:10'
      ]);

      $user = new User();
      $user->name = $request->input('name');
      $user->address = $request->input('address');
      $user->phone = $request->input('phone');
      $user->email = $request->input('email');
      $user->password = bcrypt('secret');
      $user->save();
      $user->roles()->attach($role_patient);

      $patient = new Patient();

      if ($request->input('health_insurance') != null) {
        $patient->health_insurance = true;
      }
      $patient->policy_no = $request->input('policy_no');
      $patient->user_id = $user->id;
      $patient->save();

      return redirect()->route('doctor.patients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $patient = Patient::findOrFail($id);

      return view('doctor.patients.show')->with([
        'patient' => $patient
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
      $patient = Patient::findOrFail($id);

      return view('doctor.patients.edit')->with([
        'patient' => $patient
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
      $patient = Patient::findOrFail($id);

      $request->validate([
        'name' => 'required|max:191',
        'address' => 'required|max:191',
        'phone' => 'required|max:191',
        'email' => 'required|max:191',
        // 'health_insurance' => 'required',
        'policy_no' => 'max:10'
      ]);

      $patient->user->name = $request->input('name');
      $patient->user->address = $request->input('address');
      $patient->user->phone = $request->input('phone');
      $patient->user->email = $request->input('email');
      $patient->user->password = bcrypt('secret');
      $patient->user->save();

      if ($request->input('health_insurance') != null) {
        $patient->health_insurance = true;
      }
      $patient->policy_no = $request->input('policy_no');;
      $patient->save();

      return redirect()->route('doctor.patients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $patient = Patient::findOrFail($id);
      $user = User::findOrFail($patient->user_id);


      $patient->delete();
      $user->delete();

      return redirect()->route('doctor.patients.index');
    }
}
