<?php


    class UserTableSeeder extends Seeder{

        public function run()
        {

            $users = [


                [
                    'last_name'     => 'Nyberg',
                    'first_name'    =>  'Johannes',
                    'password'      => 'v9hq9evg',
                    'email'         => 'johannes.nyb@gmail.com',
                    'metric'        => 'f',
                    'image'         => '/img/avatar.png',
                    'club_id'       => '1000000'


                ]

            ];

            foreach($users as $user)
            {
                    User::create($user);

            }


        }

    }
