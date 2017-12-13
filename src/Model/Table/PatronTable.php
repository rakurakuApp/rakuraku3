<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Patron Model
 *
 * @method \App\Model\Entity\Patron get($primaryKey, $options = [])
 * @method \App\Model\Entity\Patron newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Patron[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Patron|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Patron patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Patron[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Patron findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PatronTable extends Table
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

        $this->setTable('patron');
        $this->setDisplayField('number');
        $this->setPrimaryKey('number');

        $this->addBehavior('Timestamp');

        $this->hasMany('Children',[
            'foreignKey' => 'patron_number',
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
            ->integer('number')
            ->allowEmpty('number', 'create');

        $validator
            ->scalar('id')
            ->requirePresence('id', 'create')
            ->notEmpty('id');

        $validator
            ->scalar('password')
            ->requirePresence('password', 'create')
            ->notEmpty('password');

        $validator
            ->scalar('username')
            ->requirePresence('username', 'create')
            ->notEmpty('username');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

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
        $rules->add($rules->isUnique(['email']));

        return $rules;
    }

    public function findAuth($query, array $options)
    {
        $query->where([
            'patron.deleted' => 0,
            'patron.graduated' => 0]);
        return $query;
    }
}
