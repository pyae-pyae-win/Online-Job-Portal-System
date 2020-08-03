<?php

class Seek
{
    public $name;
    public $phone;
    public $address;
    public $nrc;
    public $email;
    public $city;
    public $education;
    public $skill;
    public $experience;
    public $position;
    public function __construct($name,$phone,$address,$nrc,$email,$city,$education,$skill,$experience,$position)
    {
      $this->name=$name;
      $this->phone=$phone;
      $this->address=$address;
      $this->nrc=$nrc;
      $this->email=$email;
      $this->city=$city;
      $this->education=$education;
      $this->skill=$skill;
      $this->experience=$experience;
      $this->position=$position;
    }
    function set_name($name)
    {
      $this->name=$name;
    }
    function set_phone($phone)
    {
      $this->phone=$phone;
    }
    function set_address($address)
    {
        $this->address=$address;
    }
    function set_nrc($nrc)
    {
      $this->nrc=$nrc;
    }
    function set_email($email)
    {
      $this->email=$email;
    }
    function set_city($city)
    {
        $this->city=$city;
    }
    function set_education($education)
    {
        $this->education=$education;
    }
    function set_skill($skill)
    {
      $this->skill=$skill;
    }
    function set_experience($experience)
    {
      $this->experience=$experience;
    }
    function set_position($position)
    {
        $this->position=$position;
    }
    function get_name()
    {
      return $this->name;
    }
    function get_phone()
    {
      return $this->phone;
    }
    function get_address()
    {
       return $this->address;
    }
    function get_nrc()
    {
      return $this->nrc;
    }
    function get_email()
    {
       return $this->email;
    }
    function get_city()
    {
       return $this->city;
    }
    function get_education()
    {
       return $this->education;
    }
    function get_skill()
    {
       return $this->skill;
    }
    function get_experience()
    {
       return $this->experience;
    }
    function get_position()
    {
       return $this->position;
    }
    public function Info()
    {
      echo "Name= {$this->name} , Phone= {$this->phone}, Address= {$this->address}, NRC= {$this->nrc}, Email={$this->email},City={$this->city},Education={$this->education},Skills={$this->skill},Experiences={$this->experience},Position={$this->position} ;";
    }
}
?>