<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DocumentTopics Model
 *
 * @property \App\Model\Table\DocumentsTable&\Cake\ORM\Association\BelongsTo $Documents
 * @property \App\Model\Table\TopicsTable&\Cake\ORM\Association\BelongsTo $Topics
 *
 * @method \App\Model\Entity\DocumentTopic newEmptyEntity()
 * @method \App\Model\Entity\DocumentTopic newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\DocumentTopic[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DocumentTopic get($primaryKey, $options = [])
 * @method \App\Model\Entity\DocumentTopic findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\DocumentTopic patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DocumentTopic[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\DocumentTopic|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DocumentTopic saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DocumentTopic[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\DocumentTopic[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\DocumentTopic[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\DocumentTopic[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class DocumentTopicsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('document_topics');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Documents', [
            'foreignKey' => 'document_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Topics', [
            'foreignKey' => 'topic_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('document_id')
            ->notEmptyString('document_id');

        $validator
            ->integer('topic_id')
            ->notEmptyString('topic_id');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('document_id', 'Documents'), ['errorField' => 'document_id']);
        $rules->add($rules->existsIn('topic_id', 'Topics'), ['errorField' => 'topic_id']);

        return $rules;
    }
}
