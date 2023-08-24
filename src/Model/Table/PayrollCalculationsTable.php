<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PayrollCalculations Model
 *
 * @property \App\Model\Table\EmployeesTable&\Cake\ORM\Association\BelongsTo $Employees
 *
 * @method \App\Model\Entity\PayrollCalculation newEmptyEntity()
 * @method \App\Model\Entity\PayrollCalculation newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\PayrollCalculation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PayrollCalculation get($primaryKey, $options = [])
 * @method \App\Model\Entity\PayrollCalculation findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\PayrollCalculation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PayrollCalculation[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\PayrollCalculation|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PayrollCalculation saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PayrollCalculation[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\PayrollCalculation[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\PayrollCalculation[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\PayrollCalculation[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class PayrollCalculationsTable extends Table
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

        $this->setTable('payroll_calculations');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Employees', [
            'foreignKey' => 'employee_id',
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
            ->integer('employee_id')
            ->requirePresence('employee_id', 'create')
            ->notEmptyString('employee_id');

        $validator
            ->numeric('earnings')
            ->requirePresence('earnings', 'create')
            ->notEmptyString('earnings');

        $validator
            ->numeric('deductions')
            ->requirePresence('deductions', 'create')
            ->notEmptyString('deductions');

        $validator
            ->numeric('additional_earnings')
            ->requirePresence('additional_earnings', 'create')
            ->notEmptyString('additional_earnings');

        $validator
            ->numeric('net_pay')
            ->requirePresence('net_pay', 'create')
            ->notEmptyString('net_pay');

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
        $rules->add($rules->existsIn('employee_id', 'Employees'), ['errorField' => 'employee_id']);

        return $rules;
    }
}
