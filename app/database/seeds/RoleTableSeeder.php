<?php


    class RoleTableSeeder extends Seeder{

        public function run()
        {

            $roles = [


                [
                    'name'     => 'User'

                ],

                [
                    'name'      => 'Admin'
                ]

            ];

            foreach($roles as $role)
            {

                Role::create($role);
            }


        }

    }
