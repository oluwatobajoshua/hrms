<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Applicants Model
 *
 * @property \App\Model\Table\JobListingsTable&\Cake\ORM\Association\BelongsTo $JobListings
 * @property \App\Model\Table\GendersTable&\Cake\ORM\Association\BelongsTo $Genders
 * @property \App\Model\Table\MaritalStatusesTable&\Cake\ORM\Association\BelongsTo $MaritalStatuses
 * @property \App\Model\Table\HighestEducationsTable&\Cake\ORM\Association\BelongsTo $HighestEducations
 *
 * @method \App\Model\Entity\Applicant newEmptyEntity()
 * @method \App\Model\Entity\Applicant newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Applicant[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Applicant get($primaryKey, $options = [])
 * @method \App\Model\Entity\Applicant findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Applicant patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Applicant[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Applicant|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Applicant saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Applicant[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Applicant[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Applicant[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Applicant[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\CounterCacheBehavior
 */
class ApplicantsTable extends Table
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

        $this->setTable('applicants');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('CounterCache', [
            'JobListings' => ['applicant_count'],
        ]);

        $this->belongsTo('JobListings', [
            'foreignKey' => 'job_listing_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Genders', [
            'foreignKey' => 'gender_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('MaritalStatuses', [
            'foreignKey' => 'marital_status_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('HighestEducations', [
            'foreignKey' => 'highest_education_id',
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
            ->integer('job_listing_id')
            ->requirePresence('job_listing_id', 'create')
            ->notEmptyString('job_listing_id');

        $validator
            ->scalar('first_name')
            ->maxLength('first_name', 255)
            ->requirePresence('first_name', 'create')
            ->notEmptyString('first_name');

        $validator
            ->scalar('last_name')
            ->maxLength('last_name', 255)
            ->requirePresence('last_name', 'create')
            ->notEmptyString('last_name');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email');

        $validator
            ->scalar('phone')
            ->maxLength('phone', 20)
            ->requirePresence('phone', 'create')
            ->notEmptyString('phone');

        $validator
            ->scalar('address')
            ->requirePresence('address', 'create')
            ->notEmptyString('address');

        $validator
            ->date('date_of_birth')
            ->requirePresence('date_of_birth', 'create')
            ->notEmptyDate('date_of_birth');

        $validator
            ->integer('gender_id')
            ->requirePresence('gender_id', 'create')
            ->notEmptyString('gender_id');

        $validator
            ->integer('marital_status_id')
            ->requirePresence('marital_status_id', 'create')
            ->notEmptyString('marital_status_id');

        $validator
            ->date('application_date')
            ->requirePresence('application_date', 'create')
            ->notEmptyDate('application_date');

        $validator
            ->scalar('nationality')
            ->maxLength('nationality', 100)
            ->requirePresence('nationality', 'create')
            ->notEmptyString('nationality');

        $validator
            ->scalar('resume_file_url')
            ->maxLength('resume_file_url', 255)
            ->requirePresence('resume_file_url', 'create')
            ->notEmptyFile('resume_file_url');

        $validator
            ->integer('highest_education_id')
            ->requirePresence('highest_education_id', 'create')
            ->notEmptyString('highest_education_id');

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
        $rules->add($rules->existsIn('job_listing_id', 'JobListings'), ['errorField' => 'job_listing_id']);
        $rules->add($rules->existsIn('gender_id', 'Genders'), ['errorField' => 'gender_id']);
        $rules->add($rules->existsIn('marital_status_id', 'MaritalStatuses'), ['errorField' => 'marital_status_id']);
        $rules->add($rules->existsIn('highest_education_id', 'HighestEducations'), ['errorField' => 'highest_education_id']);

        return $rules;
    }
}
