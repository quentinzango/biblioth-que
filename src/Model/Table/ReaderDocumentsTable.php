<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ReaderDocuments Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\DocumentsTable&\Cake\ORM\Association\BelongsTo $Documents
 *
 * @method \App\Model\Entity\ReaderDocument newEmptyEntity()
 * @method \App\Model\Entity\ReaderDocument newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\ReaderDocument[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ReaderDocument get($primaryKey, $options = [])
 * @method \App\Model\Entity\ReaderDocument findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\ReaderDocument patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ReaderDocument[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ReaderDocument|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ReaderDocument saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ReaderDocument[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ReaderDocument[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\ReaderDocument[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ReaderDocument[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ReaderDocumentsTable extends Table
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

        $this->setTable('reader_documents');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Documents', [
            'foreignKey' => 'document_id',
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
            ->integer('user_id')
            ->notEmptyString('user_id');

        $validator
            ->integer('document_id')
            ->notEmptyString('document_id');

        $validator
            ->integer('nomber_download')
            ->allowEmptyString('nomber_download');

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
        $rules->add($rules->existsIn('user_id', 'Users'), ['errorField' => 'user_id']);
        $rules->add($rules->existsIn('document_id', 'Documents'), ['errorField' => 'document_id']);

        return $rules;
    }
}
