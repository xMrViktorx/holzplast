<?php

namespace Modules\Admin\Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;

class AdminDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        User::updateOrCreate(
            ['name' => 'admin'],
            [
                'email' => 'admin@example.com',
                'password' => Hash::make('admin'),
            ]
        );
        // $this->call("OthersTableSeeder");
    }
}
