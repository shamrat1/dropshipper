<?php

use Illuminate\Database\Seeder;
use App\User;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    private $roles = [
        ["Admin", "All Access"],
        ["Company", "Company Level Access"],
        ["Business", "Business Level Access"],
        ["Editor", "Editorial Access"],
        ["Moderator", "Moderate Access"]
    ];
    public function run()
    {
        // $this->call(UserSeeder::class);
        // factory(User::class, 15)->create();
        // factory(App\Category::class, 15)->create();

        foreach ($this->roles as $role) {
            # code...
            DB::table('roles')->insert([
                'name' => $role[0],
                'description' => $role[1]
            ]);
        }

        // start of admin Setup
        DB::table('users')->insert([
            'name' => 'Super Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make("55332211sA"),
            'email_verified_at' => Carbon::now()
        ]);
        foreach ($this->roles as $key => $role) {
            # code...
            DB::table('role_user')->insert([
                'user_id' => 1,
                'role_id' => $key += 1
            ]);
        }
        // end of admin Setup
        
        // start of Company Setup
        DB::table('users')->insert([
            'name' => 'Company One',
            'email' => 'company1@gmail.com',
            'password' => Hash::make("55332211c1"),
            'email_verified_at' => Carbon::now()
        ]);
        DB::table('companies')->insert([
            'user_id' => 2,
            'address' => 'some Address',
            'lat' => '29.33446595',
            'lon' => '33.26565989'
        ]);
        DB::table('role_user')->insert([
            'user_id' => 2,
            'role_id' => 2
        ]);
        // end of company Setup

        // start of Business Setup
        DB::table('users')->insert([
            'name' => 'Business One',
            'email' => 'business1@gmail.com',
            'password' => Hash::make("55332211b1"),
            'email_verified_at' => Carbon::now()
        ]);
        DB::table('businesses')->insert([
            'user_id' => 3,
            'name' => 'Mobo Shippers',
            'description' => 'Some Description about Mobo Shippers',
            'opening_hours' => '10AM - 8PM',
            'lat' => '27.33446595',
            'lon' => '30.26565989',
            'doesShip' => 0,
            'mobile' => '16549874563'
        ]);

        DB::table('role_user')->insert([
            'user_id' => 3,
            'role_id' => 3
        ]);
        // end of Business Setup

    }
}
