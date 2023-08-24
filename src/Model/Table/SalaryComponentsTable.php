<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SalaryComponents Model
 *
 * @property \App\Model\Table\EmployeesTable&\Cake\ORM\Association\BelongsTo $Employees
 * @property \App\Model\Table\EmployeeSalaryComponentsTable&\Cake\ORM\Association\HasMany $EmployeeSalaryComponents
 *
 * @method \App\Model\Entity\SalaryComponent newEmptyEntity()
 * @method \App\Model\Entity\SalaryComponent newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\SalaryComponent[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SalaryComponent get($primaryKey, $options = [])
 * @method \App\Model\Entity\SalaryComponent findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\SalaryComponent patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SalaryComponent[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\SalaryComponent|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SalaryComponent saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SalaryComponent[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\SalaryComponent[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\SalaryComponent[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\SalaryComponent[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SalaryComponentsTable extends Table
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

        $this->setTable('salary_components');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Employees', [
            'foreignKey' => 'employee_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('EmployeeSalaryComponents', [
            'foreignKey' => 'salary_component_id',
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
            ->integer('employee_id')
            ->requirePresence('employee_id', 'create')
            ->notEmptyString('employee_id');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name')
            ->add('name', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('type')
            ->maxLength('type', 50)
            ->requirePresence('type', 'create')
            ->notEmptyString('type');

        $validator
            ->decimal('amount')
            ->requirePresence('amount', 'create')
            ->notEmptyString('amount');

        $validator
            ->scalar('frequency')
            ->maxLength('frequency', 50)
            ->allowEmptyString('frequency');

        $validator
            ->boolean('taxable')
            ->notEmptyString('taxable');

        $validator
            ->integer('priority')
            ->notEmptyString('priority');

        $validator
            ->scalar('calculation_formula')
            ->maxLength('calculation_formula', 255)
            ->allowEmptyString('calculation_formula');

        $validator
            ->scalar('description')
            ->allowEmptyString('description');

        $validator
            ->boolean('active')
            ->notEmptyString('active');

        $validator
            ->date('effective_start_date')
            ->allowEmptyDate('effective_start_date');

        $validator
            ->date('effective_end_date')
            ->allowEmptyDate('effective_end_date');

        $validator
            ->scalar('currency')
            ->maxLength('currency', 50)
            ->allowEmptyString('currency');

        $validator
            ->scalar('localization')
            ->maxLength('localization', 4294967295)
            ->allowEmptyString('localization');

        $validator
            ->scalar('attachments')
            ->allowEmptyString('attachments');

        $validator
            ->boolean('approval_required')
            ->notEmptyString('approval_required');

        $validator
            ->scalar('default_currency')
            ->maxLength('default_currency', 50)
            ->allowEmptyString('default_currency');

        $validator
            ->boolean('taxable_default')
            ->notEmptyString('taxable_default');

        $validator
            ->decimal('tax_rate')
            ->allowEmptyString('tax_rate');

        $validator
            ->decimal('tax_deduction')
            ->allowEmptyString('tax_deduction');

        $validator
            ->boolean('nigerian_taxable')
            ->notEmptyString('nigerian_taxable');

        $validator
            ->decimal('nigerian_tax_rate')
            ->allowEmptyString('nigerian_tax_rate');

        $validator
            ->decimal('pension_deduction')
            ->allowEmptyString('pension_deduction');

        $validator
            ->decimal('nhf_deduction')
            ->allowEmptyString('nhf_deduction');

        $validator
            ->integer('created_by')
            ->allowEmptyString('created_by');

        $validator
            ->integer('modified_by')
            ->allowEmptyString('modified_by');

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
        $rules->add($rules->isUnique(['name']), ['errorField' => 'name']);
        $rules->add($rules->existsIn('employee_id', 'Employees'), ['errorField' => 'employee_id']);

        return $rules;
    }
}
