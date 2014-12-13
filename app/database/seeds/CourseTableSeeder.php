<?php


class CourseTableSeeder extends Seeder{

    public function run()
    {

        $courses = [


            [
                'name' => 'Skutberget',
                'location' => 'Karlstad, Sweden',
                'par' => '57',
                'holes' => '18',
                'image' => 'skutberget.jpg',
                'fee' => 'free',
                'information' => 'Beläget vid First Camp på Skutberget, ca 10min från centrum. En utmanande bana med mycket träd och annan vegitation. Kasta rakt eller hamna i problem',
                'club' => 'Karlstad Frisbeegolf',
                'course_map' => 'banskiss.jpg'

            ]

        ];

        foreach($courses as $course)
        {

            User::create($course);
        }


    }

}
