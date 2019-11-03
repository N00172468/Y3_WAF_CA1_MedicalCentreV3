<?php
# @Author: John Carlo M. Ramos
# @Date:   2019-11-03T16:29:43+00:00
# @Email:  !!!!!---CTRL + ALT + C = Colour Picker---!!!!!
# @Last modified by:   John Carlo M. Ramos
# @Last modified time: 2019-11-03T17:07:29+00:00




use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      // Call Seeders:
      $this->call(RolesTableSeeder::class);
      $this->call(UsersTableSeeder::class);
    }
}
