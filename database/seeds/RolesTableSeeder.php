<?php
# @Author: John Carlo M. Ramos
# @Date:   2019-11-03T17:03:27+00:00
# @Email:  !!!!!---CTRL + ALT + C = Colour Picker---!!!!!
# @Last modified by:   John Carlo M. Ramos
# @Last modified time: 2019-11-03T17:30:56+00:00




use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // Creating Doctor Seeder:
    $role_doctor = new Role();
    $role_doctor->name = 'doctor';
    $role_doctor->description = 'A doctor user';
    $role_doctor->save();

    // Creating Patients Seeder:
    $role_patient = new Role();
    $role_patient->name = 'patient';
    $role_patient->description = 'A patient user';
    $role_patient->save();
    }
}
