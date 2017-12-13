<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Reset Model
 *
 * @method \App\Model\Entity\Reset get($primaryKey, $options = [])
 * @method \App\Model\Entity\Reset newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Reset[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Reset|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Reset patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Reset[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Reset findOrCreate($search, callable $callback = null, $options = [])
 */
class ResetTable extends Table
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

        $this->setTable('reset');
        $this->setDisplayField('patron_number');
        $this->setPrimaryKey(['patron_number', 'uuid']);
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
            ->integer('patron_number')
            ->allowEmpty('patron_number', 'create');

        $validator
            ->scalar('uuid')
            ->allowEmpty('uuid', 'create');

        return $validator;
    }
}
