<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Face Model
 *
 * @property \App\Model\Table\ChildrenTable|\Cake\ORM\Association\BelongsTo $Children
 * @property \App\Model\Table\PhotosTable|\Cake\ORM\Association\BelongsTo $Photos
 *
 * @method \App\Model\Entity\Face get($primaryKey, $options = [])
 * @method \App\Model\Entity\Face newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Face[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Face|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Face patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Face[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Face findOrCreate($search, callable $callback = null, $options = [])
 */
class FaceTable extends Table
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

        $this->setTable('face');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Children', [
            'foreignKey' => 'children_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Photos', [
            'foreignKey' => 'photos_id',
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
            ->scalar('id')
            ->allowEmpty('id', 'create');

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
        $rules->add($rules->existsIn(['children_id'], 'Children'));
        $rules->add($rules->existsIn(['photos_id'], 'Photos'));

        return $rules;
    }
}
