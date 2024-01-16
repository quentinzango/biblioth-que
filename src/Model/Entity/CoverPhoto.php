<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class CoverPhoto extends Entity{

    protected $_accessible = [
        '*' =>true,
        'id' => false,
        'document' => true,
        ];
}

