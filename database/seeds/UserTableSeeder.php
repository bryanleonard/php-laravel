<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\User([
        	'name' => 'Bryan Leonard',
        	'email' => 'bleonard@acrtinc.com',
        	'password' => '$2y$10$.HsF.h0n69z0QvRdbMf0suwGXPqm/iq4ydJtbTQ72Lmm23Vjsher6'
            // Bleonard3!
        ]);
        $user->save();

        $user = new \App\User([
        	'name' => 'John Doe',
        	'email' => 'jdoe@acrtinc.com',
        	'password' => '$2y$10$T21fsxkfFFrt5XvjjpaTTeXsyj7GcSzxUnPohxepU9bn8wFUeLr5m'
            //Jdoe1!
        ]);
        $user->save();
    }
}
