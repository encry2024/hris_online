<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
   public function fullName()
   {
      return $this->first_name . " " . $this->middle_initial . " " . $this->last_name;
   }

   public function getAge($dob)
   {
      if(!empty($dob)){
         $birthdate  = new \DateTime($dob);
         $today      = new \DateTime('today');
         $age        = $birthdate->diff($today)->y;
         return $age;
      }else{
         return 0;
      }
   }
}
