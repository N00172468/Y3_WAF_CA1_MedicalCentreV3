<?php
# @Author: John Carlo M. Ramos
# @Date:   2019-11-03T17:03:09+00:00
# @Email:  !!!!!---CTRL + ALT + C = Colour Picker---!!!!!
# @Last modified by:   John Carlo M. Ramos
# @Last modified time: 2019-11-06T16:11:20+00:00




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

      // Admin Role
      $role_admin = Role::where('name', 'admin')->first();

      // Doctor User:
      $doctor = new User();
      $doctor->name = "Julius M. Hibbert";
      $doctor->address = "734 Evergreen Terrace, Springfield";
      $doctor->phone = "+123 456 7890";
      $doctor->email = "doctor@email.com";
      $doctor->password = bcrypt('secret');
      $doctor->save();
      $doctor->roles()->attach($role_doctor);

      $doctor = new User();
      $doctor->name = "Nick Riviera";
      $doctor->address = "Somewhere in The Simpsons World";
      $doctor->phone = "+312 416 5729";
      $doctor->email = "hello.everybody@email.com";
      $doctor->password = bcrypt('secret');
      $doctor->save();
      $doctor->roles()->attach($role_doctor);

      $doctor = new User();
      $doctor->name = "Meredith Grey";
      $doctor->address = "Grey's Anatomy, MD";
      $doctor->phone = "+047 628 3291";
      $doctor->email = "grey.md@email.com";
      $doctor->password = bcrypt('secret');
      $doctor->save();
      $doctor->roles()->attach($role_doctor);

      $doctor = new User();
      $doctor->name = "John A. Zoidberg";
      $doctor->address = "3000, New New York, Delivery Express";
      $doctor->phone = "+726 086 3000";
      $doctor->email = "futurama@email.com";
      $doctor->password = bcrypt('secret');
      $doctor->save();
      $doctor->roles()->attach($role_doctor);

      $doctor = new User();
      $doctor->name = "Gregory House";
      $doctor->address = "Murica";
      $doctor->phone = "+383 829 1688";
      $doctor->email = "house.md@email.com";
      $doctor->password = bcrypt('secret');
      $doctor->save();
      $doctor->roles()->attach($role_doctor);

      $doctor = new User();
      $doctor->name = "Ken Jeong";
      $doctor->address = "Icebox, Las Vegas Hotel ";
      $doctor->phone = "+635 134 9271";
      $doctor->email = "but.did.you.die@email.com";
      $doctor->password = bcrypt('secret');
      $doctor->save();
      $doctor->roles()->attach($role_doctor);

      // Patient User:
      $patient = new User();
      $patient->name = "John Carlo M. Ramos";
      $patient->address = "123 Lol Help, Pls";
      $patient->phone = "+098 765 4321";
      $patient->email = "patient@email.com";
      $patient->password = bcrypt('secret');
      $patient->save();
      $patient->roles()->attach($role_patient);

      $patient = new User();
      $patient->name = "Mai Legg";
      $patient->address = "123 Faking It";
      $patient->phone = "+539 029 1739";
      $patient->email = "football.player@email.com";
      $patient->password = bcrypt('secret');
      $patient->save();
      $patient->roles()->attach($role_patient);

      $patient = new User();
      $patient->name = "Guy Buddy";
      $patient->address = "45, Fake Dr.";
      $patient->phone = "+927 173 1739";
      $patient->email = "buddy.guy@email.com";
      $patient->password = bcrypt('secret');
      $patient->save();
      $patient->roles()->attach($role_patient);

      $patient = new User();
      $patient->name = "Stud Ent";
      $patient->address = "92, Co. Carlow";
      $patient->phone = "+917 912 1649";
      $patient->email = "stud.ent@email.com";
      $patient->password = bcrypt('secret');
      $patient->save();
      $patient->roles()->attach($role_patient);

      // Admin User:
      $admin = new User();
      $admin->name = "Mo Cher";
      $admin->address = "IADT, Kill Ave, Dun Laoghaire, Dublin";
      $admin->phone = "+839 729 9273";
      $admin->email = "admin@email.com";
      $admin->password = bcrypt('secret');
      $admin->save();
      $admin->roles()->attach($role_admin);
    }
}
