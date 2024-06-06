<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        $data = array(
            'permission_name' => 'Create User'
        );

        $this->db->table('permissions')->insert();

    }

}
