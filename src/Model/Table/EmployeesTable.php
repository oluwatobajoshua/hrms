<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Employees Model
 *
 * @property \App\Model\Table\BranchesTable&\Cake\ORM\Association\BelongsTo $Branches
 * @property \App\Model\Table\GradesTable&\Cake\ORM\Association\BelongsTo $Grades
 * @property \App\Model\Table\SectionsTable&\Cake\ORM\Association\BelongsTo $Sections
 * @property \App\Model\Table\CadresTable&\Cake\ORM\Association\BelongsTo $Cadres
 * @property \App\Model\Table\BanksTable&\Cake\ORM\Association\BelongsTo $Banks
 * @property \App\Model\Table\GendersTable&\Cake\ORM\Association\BelongsTo $Genders
 * @property \App\Model\Table\ReligionsTable&\Cake\ORM\Association\BelongsTo $Religions
 * @property \App\Model\Table\LocalsTable&\Cake\ORM\Association\BelongsTo $Locals
 * @property \App\Model\Table\StatesTable&\Cake\ORM\Association\BelongsTo $States
 * @property \App\Model\Table\PhysicalPosturesTable&\Cake\ORM\Association\BelongsTo $PhysicalPostures
 * @property \App\Model\Table\MaritalStatusesTable&\Cake\ORM\Association\BelongsTo $MaritalStatuses
 * @property \App\Model\Table\HighestEducationsTable&\Cake\ORM\Association\BelongsTo $HighestEducations
 * @property \App\Model\Table\DesignationsTable&\Cake\ORM\Association\BelongsTo $Designations
 * @property \App\Model\Table\StatusesTable&\Cake\ORM\Association\BelongsTo $Statuses
 * @property \CakeDC\Users\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\AddressesTable&\Cake\ORM\Association\HasMany $Addresses
 * @property \App\Model\Table\ChildrenDetailsTable&\Cake\ORM\Association\HasMany $ChildrenDetails
 * @property \App\Model\Table\CompaniesTable&\Cake\ORM\Association\HasMany $Companies
 * @property \App\Model\Table\EducationsTable&\Cake\ORM\Association\HasMany $Educations
 * @property \App\Model\Table\LeavesTable&\Cake\ORM\Association\HasMany $Leaves
 * @property \App\Model\Table\NextOfKinsTable&\Cake\ORM\Association\HasMany $NextOfKins
 * @property \App\Model\Table\OtherDepartmentsTable&\Cake\ORM\Association\HasMany $OtherDepartments
 * @property \App\Model\Table\TransactionsTable&\Cake\ORM\Association\HasMany $Transactions
 * @property \App\Model\Table\WorkDetailsTable&\Cake\ORM\Association\HasMany $WorkDetails
 *
 * @method \App\Model\Entity\Employee newEmptyEntity()
 * @method \App\Model\Entity\Employee newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Employee[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Employee get($primaryKey, $options = [])
 * @method \App\Model\Entity\Employee findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Employee patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Employee[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Employee|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Employee saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Employee[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Employee[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Employee[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Employee[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EmployeesTable extends Table
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

        $this->setTable('employees');
        $this->setDisplayField('name_desc');
        $this->setPrimaryKey('id');

        $this->belongsTo(
            'Banks', [
            'foreignKey' => 'bank_id',
            'joinType' => 'LEFT'
            ]
        );
        $this->belongsTo(
            'ServiceCharges', [
            'className' => 'Banks',
            'foreignKey' => 'service_charge_bank',
            'joinType' => 'LEFT'
            ]
        );
        $this->belongsTo(
            'Sections', [
            'foreignKey' => 'section_id',
            'joinType' => 'LEFT'
            ]
        );
        $this->belongsTo(
            'Grades', [
            'foreignKey' => 'grade_id',
            'joinType' => 'LEFT'
            ]
        );
        $this->belongsTo(
            'Designations', [
            'foreignKey' => 'designation_id',
            'joinType' => 'LEFT'
            ]
        );
        $this->belongsTo(
            'Branches', [
            'foreignKey' => 'branch_id',
            'joinType' => 'LEFT'
            ]
        );
        $this->belongsTo(
            'Statuses', [
            'foreignKey' => 'status_id',
            'joinType' => 'LEFT'
            ]
        );
        $this->belongsTo(  
            'Cadres', [
            'foreignKey' => 'cadre_id',
            'joinType' => 'LEFT'
            ]
        );

        $this->belongsTo(
            'Genders', [
            'foreignKey' => 'gender_id',
            'joinType' => 'LEFT'
            ]
        );

        $this->belongsTo(
            'MaritalStatuses', [
            'foreignKey' => 'marital_status_id',
            'joinType' => 'LEFT'
            ]
        );

        $this->belongsTo(
            'HighestEducations', [
            'foreignKey' => 'highest_education_id',
            'joinType' => 'LEFT'
            ]
        );

        $this->belongsTo(
            'PhysicalPostures', [
            'foreignKey' => 'physical_posture_id',
            'joinType' => 'LEFT'
            ]
        );

        $this->belongsTo(
            'Religions', [
            'foreignKey' => 'religion_id',
            'joinType' => 'LEFT'
            ]
        );

        $this->belongsTo(
            'ReportsTos', [
            'className' => 'Employees',
            'foreignKey' => 'reporting_to',
            'joinType' => 'LEFT'
            ]
        );

        $this->belongsTo(
            'Locals', [
            'foreignKey' => 'local_id',
            'joinType' => 'LEFT'
            ]
        );

        $this->hasMany(
            'WorkDetails', [
            'foreignKey' => 'employee_id',
            ]
        );

        $this->hasMany(
            'NextOfKins', [
            'foreignKey' => 'employee_id',
            ]
        );

        $this->hasMany(
            'EmergencyContacts', [
            'foreignKey' => 'employee_id',
            ]
        );

        $this->hasMany(
            'EmergencyContacts', [
            'foreignKey' => 'employee_id',
            ]
        );

        $this->hasMany(
            'Leaves', [
            'foreignKey' => 'employee_id',
            ]
        );

        $this->hasMany(
            'ChildrenDetails', [
            'foreignKey' => 'employee_id',
            ]
        );

        $this->hasMany(
            'Educations', [
            'foreignKey' => 'employee_id',
            ]
        );

        $this->hasMany(
            'Addresses', [
            'foreignKey' => 'employee_id',
            ]
        );

        $this->belongsTo(
            'StateOfOrigins', [
            'className' => 'Locations',
            'foreignKey' => 'state_of_origin_id',
            'joinType' => 'LEFT'
            ]
        );

        $this->hasMany(
            'Transactions', [
            'foreignKey' => 'employee_id'
            ]
        );

        $this->hasMany(
            'OtherDepartments', [
            'foreignKey' => 'employee_id'
            ]
        );

        $this->belongsTo(
            'Departments', [
            'foreignKey' => 'department_id'
            ]
        );

        $this->belongsTo(
            'CakeDC/Users.Users', [
            'foreignKey' => 'user_id'
            ]
        );
    }

    public function isOwnedBy($employeeId, $userId)
    {
        return $this->exists(['id' => $employeeId, 'user_id' => $userId]);
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
            ->date('date_of_birth')
            ->requirePresence('date_of_birth', 'create')
            ->notEmptyDate('date_of_birth');

        $validator
            ->date('date_joined')
            ->requirePresence('date_joined', 'create')
            ->notEmptyDate('date_joined');

        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        // $validator
        //     ->integer('staff_no')
        //     ->requirePresence('staff_no', 'create')
        //     ->notEmptyString('staff_no');

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
            ->scalar('email')
            ->maxLength('email', 255)
            ->requirePresence('email', 'create')
            ->notEmptyString('email');

        $validator
            ->scalar('phone')
            ->maxLength('phone', 255)
            ->requirePresence('phone', 'create')
            ->notEmptyString('phone');

        $validator
            ->numeric('salary')
            ->requirePresence('salary', 'create')
            ->notEmptyString('salary');

        $validator
            ->numeric('grade_id')
            ->requirePresence('grade_id', 'create')
            ->notEmptyString('grade_id');
        
        $validator
            ->numeric('local_id')
            ->requirePresence('local_id', 'create')
            ->notEmptyString('local_id');

        $validator
            ->numeric('state_of_origin_id')
            ->requirePresence('state_of_origin_id', 'create')
            ->notEmptyString('state_of_origin_id');

        $validator
            ->numeric('designation_id')
            ->requirePresence('designation_id', 'create')
            ->notEmptyString('designation_id');

        $validator
            ->numeric('department_id')
            ->requirePresence('department_id', 'create')
            ->notEmptyString('department_id');

        $validator
            ->numeric('cadre_id')
            ->requirePresence('cadre_id', 'create')
            ->notEmptyString('cadre_id');
        
        $validator
            ->numeric('gender_id')
            ->requirePresence('gender_id', 'create')
            ->notEmptyString('gender_id');
        
        $validator
            ->numeric('marital_status_id')
            ->requirePresence('marital_status_id', 'create')
            ->notEmptyString('marital_status_id');

        $validator
            ->numeric('highest_education_id')
            ->requirePresence('highest_education_id', 'create')
            ->notEmptyString('highest_education_id');
        
            $validator
            ->numeric('bank_id')
            ->requirePresence('bank_id', 'create')
            ->notEmptyString('bank_id');

        $validator
            ->scalar('acct_no')
            ->maxLength('acct_no', 10)
            ->requirePresence('acct_no', 'create')
            ->notEmptyString('acct_no');

        $validator
            ->scalar('service_charge_number')
            ->maxLength('service_charge_number', 10)
            ->requirePresence('service_charge_number', 'create')
            ->allowEmptyString('service_charge_number');

        $validator
            ->integer('service_charge_bank')
            ->requirePresence('service_charge_bank', 'create')
            ->allowEmptyString('service_charge_bank');

        $validator
            ->numeric('housing_allowance')
            ->allowEmptyString('housing_allowance');

        $validator
            ->scalar('housing_upfront')
            ->maxLength('housing_upfront', 1)
            ->allowEmptyString('housing_upfront');

        $validator
            ->numeric('utility_allowance')
            ->allowEmptyString('utility_allowance');

        $validator
            ->numeric('transport_allowance')
            ->allowEmptyString('transport_allowance');

        $validator
            ->numeric('domestic_allowance')
            ->allowEmptyString('domestic_allowance');

        $validator
            ->scalar('tax_number')
            ->maxLength('tax_number', 20)
            ->allowEmptyString('tax_number');

        $validator
            ->numeric('tax_relief')
            ->allowEmptyString('tax_relief');

        $validator
            ->numeric('tax_paid_to_date')
            ->allowEmptyString('tax_paid_to_date');

        $validator
            ->scalar('pension_no')
            ->maxLength('pension_no', 15)
            ->allowEmptyString('pension_no');

        $validator
            ->numeric('medical_allowance')
            ->allowEmptyString('medical_allowance');

        $validator
            ->numeric('entertainment_allowance')
            ->allowEmptyString('entertainment_allowance');

        $validator
            ->numeric('other_allowance')
            ->allowEmptyString('other_allowance');

        $validator
            ->numeric('personal_loan')
            ->allowEmptyString('personal_loan');

        $validator
            ->numeric('pers_loan_rep')
            ->allowEmptyString('pers_loan_rep');

        $validator
            ->numeric('pers_loan_paid')
            ->allowEmptyString('pers_loan_paid');

        $validator
            ->integer('pers_loan_inst')
            ->allowEmptyString('pers_loan_inst');

        $validator
            ->numeric('car_loan')
            ->allowEmptyString('car_loan');

        $validator
            ->numeric('car_loan_rep')
            ->allowEmptyString('car_loan_rep');

        $validator
            ->integer('car_loan_inst')
            ->allowEmptyString('car_loan_inst');

        $validator
            ->numeric('car_loan_paid')
            ->allowEmptyString('car_loan_paid');

        $validator
            ->numeric('whl_cics')
            ->allowEmptyString('whl_cics');

        $validator
            ->numeric('pension_control')
            ->allowEmptyString('pension_control');

        $validator
            ->numeric('salary_advance')
            ->allowEmptyString('salary_advance');

        $validator
            ->numeric('salary_advance_rep')
            ->allowEmptyString('salary_advance_rep');

        $validator
            ->numeric('salary_advance_paid')
            ->allowEmptyString('salary_advance_paid');

        $validator
            ->integer('salary_advance_inst')
            ->allowEmptyString('salary_advance_inst');

        $validator
            ->numeric('drivers_allowance')
            ->allowEmptyString('drivers_allowance');

        $validator
            ->numeric('bro_cics')
            ->allowEmptyString('bro_cics');

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
        $rules->add($rules->existsIn('branch_id', 'Branches'), ['errorField' => 'branch_id']);
        $rules->add($rules->existsIn('grade_id', 'Grades'), ['errorField' => 'grade_id']);
        $rules->add($rules->existsIn('department_id', 'Departments'), ['errorField' => 'department_id']);
        $rules->add($rules->existsIn('section_id', 'Sections'), ['errorField' => 'section_id']);
        $rules->add($rules->existsIn('cadre_id', 'Cadres'), ['errorField' => 'cadre_id']);
        $rules->add($rules->existsIn('bank_id', 'Banks'), ['errorField' => 'bank_id']);
        $rules->add($rules->existsIn('gender_id', 'Genders'), ['errorField' => 'gender_id']);
        $rules->add($rules->existsIn('religion_id', 'Religions'), ['errorField' => 'religion_id']);
        $rules->add($rules->existsIn('local_id', 'Locals'), ['errorField' => 'local_id']);
        // $rules->add($rules->existsIn('state_id', 'States'), ['errorField' => 'state_id']);
        $rules->add($rules->existsIn('physical_posture_id', 'PhysicalPostures'), ['errorField' => 'physical_posture_id']);
        $rules->add($rules->existsIn('marital_status_id', 'MaritalStatuses'), ['errorField' => 'marital_status_id']);
        $rules->add($rules->existsIn('highest_education_id', 'HighestEducations'), ['errorField' => 'highest_education_id']);
        $rules->add($rules->existsIn('designation_id', 'Designations'), ['errorField' => 'designation_id']);
        $rules->add($rules->existsIn('status_id', 'Statuses'), ['errorField' => 'status_id']);
        $rules->add($rules->existsIn('user_id', 'Users'), ['errorField' => 'user_id']);
        
        $rules->add($rules->isUnique(
            ['staff_no'],
            'This staff No has already been used.'
        ));

        $rules->add($rules->isUnique(
            ['email'],
            'This email has already been used.'
        ));
        
        $rules->add($rules->isUnique(
            ['phone'],
            'This phone has already been used.'
        ));

        return $rules;
    }
}
