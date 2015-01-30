<?php


    class UserTableSeeder extends Seeder{

        public function run()
        {

            $users = [


                [
                    'last_name'     => 'Allansson',
                    'first_name'    =>  'Allan',
                    'password'      => 'v9hq9evg',
                    'email'         => 'johannes.nyb@gmail.com',
                    'metric'        => 'f',
                    'image'         => '/img/avatar.png',
                    'club_id'       => '1000000'


                ]

            ];

            foreach($users as $user)
            {
                for($i=0; $i<40; $i++){
                    User::create($user);
                }
            }


        }

    }
