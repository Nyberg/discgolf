<?php


    class UserTableSeeder extends Seeder{

        public function run()
        {

            $users = [


                [
                    'username' => 'Nyberg',
                    'password' => 'v9hq9evg',
                    'email'    => 'johannes.nyb@gmail.com',
                    'metric'   => 'f',
                    'image'    => 'me.png'

                ]

            ];

            foreach($users as $user)
            {

                User::create($user);
            }


        }

    }
