<?php

namespace Database\Seeders;

use App\Domains\Auth\Models\Permission;
use App\Domains\Auth\Models\Role;
use App\Domains\Auth\Models\User;
use Database\Seeders\Traits\DisableForeignKeys;
use Illuminate\Database\Seeder;

class ValidatorRoleSeeder extends Seeder
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
            'id' => 2,
            'type' => User::TYPE_ADMIN,
            'name' => 'Admin Validator',
        ]);

        Permission::create([
            'type' => User::TYPE_ADMIN,
            'name' => 'admin.access.topups',
            'description' => 'All Topup Management Permissions',
        ]);

        // Assign Permissions to other Roles
        //

        $this->enableForeignKeys();
    }
}
