<?php
namespace App\Models;

use Shanmuga\LaravelEntrust\Models\EntrustRole;
use DateTimeInterface;

class Role extends EntrustRole
{
    
    
     /**
    * Prepare a date for array / JSON serialization.
    *
    * @param  \DateTimeInterface  $date
    * @return string
    */
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
