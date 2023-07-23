<?php

namespace Database\Seeders;

use App\Domains\Auth\Models\Permission;
use App\Domains\Auth\Models\Role;
use App\Domains\Auth\Models\User;
use Database\Seeders\Traits\DisableForeignKeys;
use Illuminate\Database\Seeder;

class LogisticRoleSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();

        // Create Roles
        Role::create([
            'id' => 3,
            'type' => User::TYPE_ADMIN,
            'name' => 'Admin Logistic',
        ]);

        Permission::create([
            'type' => User::TYPE_ADMIN,
            'name' => 'admin.access.redeems',
            'description' => 'All Redeem Management Permissions',
        ]);

        // Assign Permissions to other Roles
        //

        $this->enableForeignKeys();
    }
}
