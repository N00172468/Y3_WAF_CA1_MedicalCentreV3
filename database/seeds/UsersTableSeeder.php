<?php
# @Author: John Carlo M. Ramos
# @Date:   2019-11-03T17:03:09+00:00
# @Email:  !!!!!---CTRL + ALT + C = Colour Picker---!!!!!
# @Last modified by:   John Carlo M. Ramos
# @Last modified time: 2019-11-03T17:23:54+00:00




use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // Doctor Role:
      $role_doctor = Role::where('name', 'doctor')->first();

      // Patient Role
      $role_patient = Role::where('name', 'patient')->first();

      // Doctor User:
      $doctor = new User();
      $doctor->name = "Dr. Hibbert";
      $doctor->address = "3000, New New York, Delivery Express";
      $doctor->phone = "+123 456 7890";
      $doctor->email = "futurama@email.com";
      $doctor->password = bcrypt('secret');
      $doctor->save();
      $doctor->roles()->attach($role_doctor);

      // Patient User:
      $patient = new User();
      $patient->name = "Mai Lehg";
      $patient->address = "123 Fake St, Faking It";
      $patient->phone = "+098 765 4321";
      $patient->email = "m.l@email.com";
      $patient->password = bcrypt('secret');
      $patient->save();
      $patient->roles()->attach($role_patient);
    }
}
