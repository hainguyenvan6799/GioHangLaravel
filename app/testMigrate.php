<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class testMigrate extends Model
{
    //
    protected $table = "table_test";
    protected $fillable = ['user_id'];
}
