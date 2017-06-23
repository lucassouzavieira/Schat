<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = "Lucas S. Vieira";
        $user->email = "user@user.com";
        $user->password = bcrypt('123456');
        $user->save();

        $user = new User();
        $user->name = "Other";
        $user->email = "user@other.com";
        $user->password = bcrypt('123456');
        $user->save();
    }
}
