<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Children Model
 *
 * @property \App\Model\Table\ChildClassTable|\Cake\ORM\Association\BelongsTo $ChildClass
 *
 * @method \App\Model\Entity\Child get($primaryKey, $options = [])
 * @method \App\Model\Entity\Child newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Child[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Child|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Child patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Child[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Child findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ChildrenTable extends Table
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

        $this->setTable('children');
        $this->setDisplayField('id');
        $this->setPrimaryKey(['id', 'patron_number']);

        $this->addBehavior('Timestamp');

        $this->belongsTo('ChildClass', [
            'foreignKey' => 'child_class_id',
            'joinType' => 'INNER'
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
            ->integer('patron_number')
            ->allowEmpty('patron_number', 'create');

        $validator
            ->scalar('username')
            ->requirePresence('username', 'create')
            ->notEmpty('username');

        $validator
            ->integer('age')
            ->requirePresence('age', 'create')
            ->notEmpty('age');

        $validator
            ->boolean('graduated')
            ->requirePresence('graduated', 'create')
            ->notEmpty('graduated');

        $validator
            ->boolean('deleted')
            ->requirePresence('deleted', 'create')
            ->notEmpty('deleted');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->existsIn(['child_class_id'], 'ChildClass'));

        return $rules;
    }
}
