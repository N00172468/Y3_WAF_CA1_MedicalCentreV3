<?php
# @Author: John Carlo M. Ramos
# @Date:   2019-11-17T16:53:58+00:00
# @Email:  !!!!!---CTRL + ALT + C = Colour Picker---!!!!!
# @Last modified by:   John Carlo M. Ramos
# @Last modified time: 2019-11-17T17:43:18+00:00




use Illuminate\Database\Seeder;
use App\Role;
use App\User;
use App\Patient;

class PatientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $role_patient = Role::where('name', 'patient')->first();

      foreach($role_patient->users as $user) {
        $patient = new Patient();
        $patient->health_insurance = false;
        $patient->policy_no = $this->random_str(10, '0123456789');
        $patient->user_id = $user->id;
        $patient->save();
      }
    }

    private function random_str($length, $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')
    {
      $pieces = [];
      $max = mb_strlen($keyspace, '8bit') - 1;

      for ($i = 0; $i < $length; ++$i) {
        $pieces []= $keyspace[random_int(0, $max)];
      }

      return implode('', $pieces);
    }
}
