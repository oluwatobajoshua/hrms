<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AttendanceRecords Model
 *
 * @property \App\Model\Table\EmployeesTable&\Cake\ORM\Association\BelongsTo $Employees
 * @property \App\Model\Table\LeavesTable&\Cake\ORM\Association\BelongsTo $Leaves
 *
 * @method \App\Model\Entity\AttendanceRecord newEmptyEntity()
 * @method \App\Model\Entity\AttendanceRecord newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\AttendanceRecord[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AttendanceRecord get($primaryKey, $options = [])
 * @method \App\Model\Entity\AttendanceRecord findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\AttendanceRecord patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AttendanceRecord[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\AttendanceRecord|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AttendanceRecord saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AttendanceRecord[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\AttendanceRecord[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\AttendanceRecord[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\AttendanceRecord[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class AttendanceRecordsTable extends Table
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

        $this->setTable('attendance_records');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Employees', [
            'foreignKey' => 'employee_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Leaves', [
            'foreignKey' => 'leave_id',
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
            ->date('date')
            ->requirePresence('date', 'create')
            ->notEmptyDate('date');

        $validator
            ->time('check_in_time')
            ->allowEmptyTime('check_in_time');

        $validator
            ->time('check_out_time')
            ->allowEmptyTime('check_out_time');

        $validator
            ->scalar('status')
            ->maxLength('status', 20)
            ->requirePresence('status', 'create')
            ->notEmptyString('status');

        $validator
            ->scalar('attendance_type')
            ->maxLength('attendance_type', 20)
            ->allowEmptyString('attendance_type');

        $validator
            ->integer('leave_id')
            ->allowEmptyString('leave_id');

        $validator
            ->scalar('remarks')
            ->allowEmptyString('remarks');

        $validator
            ->scalar('location')
            ->maxLength('location', 50)
            ->allowEmptyString('location');

        $validator
            ->scalar('approval_status')
            ->maxLength('approval_status', 20)
            ->allowEmptyString('approval_status');

        $validator
            ->boolean('shift_change')
            ->notEmptyString('shift_change');

        $validator
            ->time('lateness_duration')
            ->allowEmptyTime('lateness_duration');

        $validator
            ->time('early_leaving_duration')
            ->allowEmptyTime('early_leaving_duration');

        $validator
            ->boolean('remote_work')
            ->notEmptyString('remote_work');

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
        $rules->add($rules->existsIn('leave_id', 'Leaves'), ['errorField' => 'leave_id']);

        return $rules;
    }
}
