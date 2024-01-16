<?php

namespace App\Model\Table;
use Cake\ORM\Table;

class DocumentsTable extends Table
{

public function initialize(array $config): void
{
    parent::initialize($config);

    $this->belongsTo('Documents');
}

}
