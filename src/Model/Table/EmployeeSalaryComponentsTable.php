<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * EmployeeSalaryComponents Model
 *
 * @property \App\Model\Table\EmployeesTable&\Cake\ORM\Association\BelongsTo $Employees
 * @property \App\Model\Table\SalaryComponentsTable&\Cake\ORM\Association\BelongsTo $SalaryComponents
 *
 * @method \App\Model\Entity\EmployeeSalaryComponent newEmptyEntity()
 * @method \App\Model\Entity\EmployeeSalaryComponent newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\EmployeeSalaryComponent[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\EmployeeSalaryComponent get($primaryKey, $options = [])
 * @method \App\Model\Entity\EmployeeSalaryComponent findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\EmployeeSalaryComponent patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\EmployeeSalaryComponent[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\EmployeeSalaryComponent|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EmployeeSalaryComponent saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EmployeeSalaryComponent[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\EmployeeSalaryComponent[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\EmployeeSalaryComponent[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\EmployeeSalaryComponent[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EmployeeSalaryComponentsTable extends Table
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

        $this->setTable('employee_salary_components');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Employees', [
            'foreignKey' => 'employee_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('SalaryComponents', [
            'foreignKey' => 'salary_component_id',
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
            ->integer('salary_component_id')
            ->requirePresence('salary_component_id', 'create')
            ->notEmptyString('salary_component_id');

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
        $rules->add($rules->existsIn('salary_component_id', 'SalaryComponents'), ['errorField' => 'salary_component_id']);

        return $rules;
    }
}
