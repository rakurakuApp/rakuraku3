<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ChildClass Model
 *
 * @method \App\Model\Entity\ChildClas get($primaryKey, $options = [])
 * @method \App\Model\Entity\ChildClas newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ChildClas[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ChildClas|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ChildClas patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ChildClas[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ChildClas findOrCreate($search, callable $callback = null, $options = [])
 */
class ChildClassTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('child_class');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('class_name')
            ->requirePresence('class_name', 'create')
            ->notEmpty('class_name');

        return $validator;
    }
}
