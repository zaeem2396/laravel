<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Credential extends Model
{
    function auth($email, $password)
    {
        $sql = DB::table("users")->where([
            ["email", "=", $email],
            ["password", "=", $password]
        ])->get();
        if (count($sql) > 0) {
            return 1;
        } else {
            return 2;
        }
    }
}
