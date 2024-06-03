<?php

namespace Source\Models\App;

use Source\Core\Model;

/**
 * Class Newsletter
 * @package Source\Models
 */
class Nesletter extends Model
{
    /**
     * Athletic constructor.
     */
    public function __construct()
    {
        parent::__construct("newsletter", ["id"], ["email"]);
    }
}
