<?php


namespace Source\Models;


use Source\Core\Model;

class userAddress extends Model
{
    public function __construct()
    {
        parent::__construct("user_address", ["id"], ["user_id"]);
    }
}
