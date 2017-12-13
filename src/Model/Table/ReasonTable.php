<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Reason Model
 *
 * @property \App\Model\Table\InquiriesTable|\Cake\ORM\Association\HasMany $Inquiries
 *
 * @method \App\Model\Entity\Reason get($primaryKey, $options = [])
 * @method \App\Model\Entity\Reason newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Reason[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Reason|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Reason patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Reason[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Reason findOrCreate($search, callable $callback = null, $options = [])
 */
class ReasonTable extends Table
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

        $this->setTable('reason');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Inquiries', [
            'foreignKey' => 'reason_id'
        ]);
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
            ->scalar('detail')
            ->requirePresence('detail', 'create')
            ->notEmpty('detail');

        return $validator;
    }
}
