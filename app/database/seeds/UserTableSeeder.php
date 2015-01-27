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
                    'image'         => '/img/me.png',
                    'club_id'       => '1'


                ]

            ];

            foreach($users as $user)
            {

                User::create($user);
            }


        }

    }
