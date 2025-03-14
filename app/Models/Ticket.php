<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $connection = "mysql_manager";

    protected $table = "tickets";
}
