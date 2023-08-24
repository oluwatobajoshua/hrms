<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * JobListings Model
 *
 * @property \App\Model\Table\DesignationsTable&\Cake\ORM\Association\BelongsTo $Designations
 * @property \App\Model\Table\ApplicantsTable&\Cake\ORM\Association\HasMany $Applicants
 * @property \App\Model\Table\StagesTable&\Cake\ORM\Association\HasMany $Stages
 *
 * @method \App\Model\Entity\JobListing newEmptyEntity()
 * @method \App\Model\Entity\JobListing newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\JobListing[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\JobListing get($primaryKey, $options = [])
 * @method \App\Model\Entity\JobListing findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\JobListing patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\JobListing[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\JobListing|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\JobListing saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\JobListing[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\JobListing[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\JobListing[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\JobListing[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class JobListingsTable extends Table
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

        $this->setTable('job_listings');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Designations', [
            'foreignKey' => 'designation_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Applicants', [
            'foreignKey' => 'job_listing_id',
        ]);
        $this->hasMany('Stages', [
            'foreignKey' => 'job_listing_id',
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
            ->integer('designation_id')
            ->requirePresence('designation_id', 'create')
            ->notEmptyString('designation_id');

        $validator
            ->scalar('job_description')
            ->requirePresence('job_description', 'create')
            ->notEmptyString('job_description');

        $validator
            ->scalar('requirements')
            ->requirePresence('requirements', 'create')
            ->notEmptyString('requirements');

        $validator
            ->date('posting_date')
            ->requirePresence('posting_date', 'create')
            ->notEmptyDate('posting_date');

        $validator
            ->date('closing_date')
            ->allowEmptyDate('closing_date');

        $validator
            ->boolean('is_active')
            ->notEmptyString('is_active');

        $validator
            ->integer('applicant_count')
            ->requirePresence('applicant_count', 'create')
            ->notEmptyString('applicant_count');

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
        $rules->add($rules->existsIn('designation_id', 'Designations'), ['errorField' => 'designation_id']);

        return $rules;
    }
}
