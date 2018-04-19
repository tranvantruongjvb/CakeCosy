<?php

namespace App\Model\Table;

use App\Model\Entity\User;
use App\Model\Entity\Product;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;
class UsersTable extends Table 
{


	public function initialize(array $config){
		$this->addBehavior("Timestamp");
		$this->hasMany('Users', [
            'foreignKey' => 'user_id'
        ]);	
	}
	
	    /**
     * Returns a rules checker object . It is used  for validating data
     * I used it her to check if email is unique 
	 **/
	
	    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['email']));
        return $rules;
    }
	
}

?>