<?php


    class ClubTableSeeder extends Seeder{

        public function run()
        {

            $clubs = [


                [
                    'name'     => 'Klarälvens DGC',
                    'country_id'    =>  '1',
                    'state_id'      => '1',
                    'city_id'         => '1',
                    'image'         => '/img/Dg/header.jpg',
                    'website'        => 'johannesnyberg.se',
                    'information'         => 'Hej',
                    'members'       => '1',
                    'status'        => ''

                ]

            ];

            foreach($clubs as $club)
            {

                Club::create($club);
            }


        }

    }
