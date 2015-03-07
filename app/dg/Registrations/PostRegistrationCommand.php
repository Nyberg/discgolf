<?php


namespace dg\Registrations;

class PostRegistrationCommand
{
    public $first_name;
    public $last_name;
    public $password;
    public $email;
    public $image;
    public $club_id;
    public $activated;


    public function __construct($first_name, $last_name, $password, $email, $image, $club_id, $activated){
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->password = $password;
        $this->email = $email;
        $this->image = $image;
        $this->club_id = $club_id;
        $this->activated = $activated;
    }

}