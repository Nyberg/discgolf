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
                ],

                [
                    'name'      => 'ClubOwner'
                ]

            ];

            foreach($roles as $role)
            {

                Role::create($role);
            }


        }

    }
