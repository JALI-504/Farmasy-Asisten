<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = User::create(
            [
                'name' => 'Usuario 1',
                'username' => 'Admin',
                'id_empleado' => 1,
                'email_verified_at'=> null,
                'email' => 'isai07@gmail.com',
                'password' => '$2y$10$AluNc8YndjBpdof62Q4wAesLlvzCLwgkUh.QzutYZjfi8Y8YZN4KC',
            ]
        );

        $user2 = User::create(
            [
                'name' => 'Usuario 2',
                'username' => 'Doctor',
                'id_empleado' => 2,
                'email_verified_at'=> null,
                'email' => 'luismolina@gmail.com',
                'password' => '$2y$10$AluNc8YndjBpdof62Q4wAesLlvzCLwgkUh.QzutYZjfi8Y8YZN4KC',
            ]
        );

        $user3 = User::create(
            [
                'name' => 'Usuario 3',
                'username' => 'Vendedor',
                'id_empleado' => 3,
                'email_verified_at'=> null,
                'email' => 'molinaluis@gmail.com',
                'password' => '$2y$10$AluNc8YndjBpdof62Q4wAesLlvzCLwgkUh.QzutYZjfi8Y8YZN4KC',
            ]
        );

        $user1->assignRole('Admin');
        $user2->assignRole('Doctor');
        $user3->assignRole('Vendedor');
    }
}