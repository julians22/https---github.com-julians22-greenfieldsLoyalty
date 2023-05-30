<?php

namespace Database\Seeders;

use App\Domains\Auth\Models\User;
use App\Domains\Auth\Models\UserAddress;
use Database\Seeders\Traits\DisableForeignKeys;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Seeder;

class RemoveUnprimaryUserAddressSeeder extends Seeder
{
    use DisableForeignKeys, TruncateTable;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();

        UserAddress::where('is_primary', 0)->delete();

        $this->enableForeignKeys();
    }
}
