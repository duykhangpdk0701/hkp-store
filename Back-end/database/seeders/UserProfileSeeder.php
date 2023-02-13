<?php

namespace Database\Seeders;

use App\Acl\Acl;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::withoutEvents(function () {
            $users = User::all();

            foreach ($users as $user) {
                if (!$user->userProfile) {
                    $user->userProfile()->create();
                }
            }

            return true;
        });
    }
}
