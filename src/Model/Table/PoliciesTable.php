<?php
// src/Model/Table/PoliciesTable.php
namespace App\Model\Table;

use Cake\ORM\Table;

class PoliciesTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
    }
}
