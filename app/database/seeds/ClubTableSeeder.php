<?php


    class ClubTableSeeder extends Seeder{

        public function run()
        {

            $clubs = [


                [
                    'name'     => 'Klarälvens DGC',
                    'country'    =>  'Sverige',
                    'state'      => 'Värmland',
                    'city'         => 'Karlstad',
                    'image'         => '/img/dg/header.jpg',
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
