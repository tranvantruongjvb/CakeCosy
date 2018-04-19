<?php 
namespace App\Model\Table;

use App\Model\Entity\User;
use App\Model\Entity\Product;
use Cake\ORM\Table;


class TypeProductsTable extends Table
{
    public function initialize(array $config)
    {	
        $this->addBehavior("Timestamp");
    }
}
 ?>