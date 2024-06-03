<?php

namespace Source\Models\App;

use Source\Core\Model;
use Source\Models\User;

/**
 * Class Event
 * @package Source\Models
 */
class Products extends Model
{
    /**
     * Athletic constructor.
     */
    public function __construct()
    {
        parent::__construct("products", ["id"], ["title"]);
    }
}
