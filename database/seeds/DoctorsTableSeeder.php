<?php
# @Author: John Carlo M. Ramos
# @Date:   2019-11-17T16:53:43+00:00
# @Email:  !!!!!---CTRL + ALT + C = Colour Picker---!!!!!
# @Last modified by:   John Carlo M. Ramos
# @Last modified time: 2019-11-19T13:41:42+00:00




use Illuminate\Database\Seeder;
use App\Role;
use App\User;
use App\Doctor;

class DoctorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_doctor = Role::where('name', 'doctor')->first();

        foreach($role_doctor->users as $user) {
          $doctor = new Doctor();
          $doctor->date_started = '1997-11-12';
          $doctor->user_id = $user->id;
          $doctor->save();
        }
    }
}
