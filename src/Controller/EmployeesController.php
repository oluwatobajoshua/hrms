<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Core\Configure;

/**
 * Employees Controller
 *
 * @property \App\Model\Table\EmployeesTable $Employees
 * @method \App\Model\Entity\Employee[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EmployeesController extends AppController
{

    public function employeeProfile($employeeId = null)
    {
        if(!$employeeId){
            $employee = $this->Employees->newEmptyEntity();
        }else{
            $employee = $this->Employees->get($employeeId, [
                'contain' => ['NextOfKins', 'WorkDetails', 'Educations', 'ChildrenDetails', 'Addresses', 'OtherDepartments.Sections'],
            ]);
        }

        if ($this->request->is(['patch', 'post', 'put'])) {
            $employee = $this->Employees->patchEntity($employee,$this->request->getData());
            // debug($employee);
            if ($this->Employees->save($employee)) {
                $this->Flash->success('The employee has been saved.');
                $this->redirect(['action' => 'view',$employee->id]);
            }            
        }

        $users = $this->Employees->Users->find('list', ['limit' => 200]);
        $branches = $this->Employees->Branches->find('list', ['limit' => 200])->all();
        $grades = $this->Employees->Grades->find('list', ['limit' => 200])->all();
        $sections = $this->Employees->Sections->find('list', ['limit' => 200])->all();
        $cadres = $this->Employees->Cadres->find('list', ['limit' => 200])->all();
        $banks = $this->Employees->Banks->find('list', ['limit' => 200])->all();
        $service = $this->Employees->Banks->find('list', ['limit' => 200])->all();
        $genders = $this->Employees->Genders->find('list', ['limit' => 200])->all();
        $religions = $this->Employees->Religions->find('list', ['limit' => 200])->all();
        $locals = $this->Employees->Locals->find('list')->where(['Locals.state_id IS' => $employee->state_of_origin_id]);
        $stateoforigins = $this->Employees->StateOfOrigins->find('list', ['limit' => 200]);
        $departments = $this->Employees->Departments->find('list', ['limit' => 200])->all();
        $stateoforigins = $this->Employees->StateOfOrigins->find('list', ['limit' => 200]);
        $physicalPostures = $this->Employees->PhysicalPostures->find('list', ['limit' => 200])->all();
        $maritalStatuses = $this->Employees->MaritalStatuses->find('list', ['limit' => 200])->all();
        $highestEducations = $this->Employees->HighestEducations->find('list', ['limit' => 200])->all();
        $designations = $this->Employees->Designations->find('list', ['limit' => 200])->all();
        $statuses = $this->Employees->Statuses->find('list', ['limit' => 200])->all();
        $reportingTos = $this->Employees->find('list', ['limit' => 200])->all();
        $this->set(compact('reportingTos','users','departments','stateoforigins','employee', 'branches', 'grades', 'sections', 'cadres', 'banks', 'genders', 'religions', 'locals', 'physicalPostures', 'maritalStatuses', 'highestEducations', 'designations', 'statuses'));
    }

    public function employeeBioData($employeeId = null)
    {
        if(!$employeeId){
            $employee = $this->Employees->newEmptyEntity();
        }else{
            $employee = $this->Employees->get($employeeId, [
                'contain' => ['NextOfKins', 'WorkDetails', 'Educations', 'ChildrenDetails', 'Addresses', 'OtherDepartments.Sections'],
            ]);
        }

        if ($this->request->is(['patch', 'post', 'put'])) {
            $employee = $this->Employees->patchEntity($employee,$this->request->getData());
            if ($this->Employees->save($employee)) {
                $this->Flash->success(__in('The employee has been saved.'));
                $this->redirect(['action' => 'employeeBioData',$employee->id]);
            }            
        }

        $users = $this->Employees->Users->find('list', ['limit' => 200]);
        $branches = $this->Employees->Branches->find('list', ['limit' => 200])->all();
        $grades = $this->Employees->Grades->find('list', ['limit' => 200])->all();
        $sections = $this->Employees->Sections->find('list', ['limit' => 200])->all();
        $cadres = $this->Employees->Cadres->find('list', ['limit' => 200])->all();
        $banks = $this->Employees->Banks->find('list', ['limit' => 200])->all();
        $service = $this->Employees->Banks->find('list', ['limit' => 200])->all();
        $genders = $this->Employees->Genders->find('list', ['limit' => 200])->all();
        $religions = $this->Employees->Religions->find('list', ['limit' => 200])->all();
        $locals = $this->Employees->Locals->find('list')->where(['Locals.state_id IS' => $employee->state_of_origin_id]);
        $stateoforigins = $this->Employees->StateOfOrigins->find('list', ['limit' => 200]);
        $departments = $this->Employees->Departments->find('list', ['limit' => 200])->all();
        $stateoforigins = $this->Employees->StateOfOrigins->find('list', ['limit' => 200]);
        $physicalPostures = $this->Employees->PhysicalPostures->find('list', ['limit' => 200])->all();
        $maritalStatuses = $this->Employees->MaritalStatuses->find('list', ['limit' => 200])->all();
        $highestEducations = $this->Employees->HighestEducations->find('list', ['limit' => 200])->all();
        $designations = $this->Employees->Designations->find('list', ['limit' => 200])->all();
        $statuses = $this->Employees->Statuses->find('list', ['limit' => 200])->all();
        $reportingTos = $this->Employees->find('list', ['limit' => 200])->all();
        $this->set(compact('reportingTos','users','departments','stateoforigins','employee', 'branches', 'grades', 'sections', 'cadres', 'banks', 'genders', 'religions', 'locals', 'physicalPostures', 'maritalStatuses', 'highestEducations', 'designations', 'statuses'));
    }

    public function employeePayroll($employeeId = null)
    {
        // debug(!$employeeId);
        if(!$employeeId){
            return $this->redirect(['action' => 'employeeBioData']);
            $this->Flash->error(__in('You have to save an employee.'));
        }

        $employee = $this->Employees->get($employeeId);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $employee = $this->Employees->patchEntity($employee,$this->request->getData());
            if ($this->Employees->save($employee)) {
                $this->Flash->success(__('The employee has been saved.'));
                // $this->redirect(['action' => 'employeeAddress']);
            }            
        }

        $users = $this->Employees->Users->find('list', ['limit' => 200]);
        $banks = $this->Employees->Banks->find('list', ['limit' => 200])->all();

        $this->set(compact('employee','users','banks'));
    }

    public function employeeAddress($employeeId = null)
    {
        $employee = $this->Employees->get($employeeId, [
            'contain' => ['NextOfKins', 'WorkDetails', 'Educations', 'ChildrenDetails', 'Addresses', 'OtherDepartments.Sections'],
        ]);

        $addressCount       = count($employee->addresses) ? count($employee->addresses) : 1;

        if ($this->request->is('post') && $this->request->getData('addressCount')) {
            $addressCount = $this->request->getData('addressCount');
            // debug($this->request->getData());
            //exit;
        }

        if ($this->request->is(['patch', 'post', 'put']) && !$this->request->getData('addressCount')) {
            $employee = $this->Employees->patchEntity($employee,$this->request->getData());
            // debug($employee);
            if ($this->Employees->save($employee)) {
                $this->Flash->success(__('The employee has been saved.'));
                // $this->redirect(['action' => 'employeeAddress']);
            }            
        }

        $addressTypes = $this->Employees->Addresses->AddressTypes->find('list', ['limit' => 200]);

        $this->set(compact('employee','addressTypes','addressCount'));
    }

    public function employeeNextOfKin($employeeId = null)
    {
        $employee = $this->Employees->get($employeeId, [
            'contain' => ['NextOfKins', 'WorkDetails', 'Educations', 'ChildrenDetails', 'Addresses', 'OtherDepartments.Sections'],
        ]);

        $nextOfKinCount     = count($employee->next_of_kins) ? count($employee->next_of_kins) : 1;

        if ($this->request->is('post') && $this->request->getData('nextOfKinCount')) {
            $nextOfKinCount = $this->request->getData('nextOfKinCount');
            //debug($this->request->getData());s
            //exit;
        }

        if ($this->request->is(['patch', 'post', 'put']) && !$this->request->getData('nextOfKinCount')) {
            $employee = $this->Employees->patchEntity($employee,$this->request->getData());
            if ($this->Employees->save($employee)) {
                $this->Flash->success(__('Employee next of kin has been saved'));
                // $this->redirect(['action' => 'employeeAddress']);
            }            
        }

        $relationships = $this->Employees->NextOfKins->Relationships->find('list', ['limit' => 200]);
        // debug($relationships->toList());
        
        $this->set(compact('employee','relationships','nextOfKinCount'));
    }

    public function employeeEmergencyContact($employeeId = null)
    {
        $employee = $this->Employees->get($employeeId, [
            'contain' => ['EmergencyContacts'],
        ]);

        $emergencyContactCount     = 2;

        if ($this->request->is('post') && $this->request->getData('emergencyContactCount')) {
            // $emergencyContactCount = $this->request->getData('emergencyContactCount');
            //debug($this->request->getData());s
            $this->Flash->error(__('There can\'t be more than 2 emergency contacts '));
        }

        if ($this->request->is(['patch', 'post', 'put']) && !$this->request->getData('emergencyContactCount')) {
            $employee = $this->Employees->patchEntity($employee,$this->request->getData());
            // debug($employee); exit;
            if ($this->Employees->save($employee)) {
                $this->Flash->success(__('Employee Emergency Contact saved'));
                // $this->redirect(['action' => 'employeeAddress']);
            }            
        }

        $relationships = $this->Employees->EmergencyContacts->Relationships->find('list', ['limit' => 200]);
        // debug($relationships->toList());
        
        $this->set(compact('employee','relationships','emergencyContactCount'));
    }

    public function employeeWorkHistory($employeeId = null)
    {
        $employee = $this->Employees->get($employeeId, [
            'contain' => ['NextOfKins', 'WorkDetails', 'Educations', 'ChildrenDetails', 'Addresses', 'OtherDepartments.Sections'],
        ]);
        
        $workCount          = count($employee->work_details) ? count($employee->work_details) : 1;

        // debug($employeeData);
        if ($this->request->is('post') && $this->request->getData('workCount')) {
            $workCount = $this->request->getData('workCount');
            //debug($this->request->getData());s
            //exit;
        }

        if ($this->request->is(['patch', 'post', 'put']) && !$this->request->getData('workCount')) {
            $employee = $this->Employees->patchEntity($employee,$this->request->getData());
            if ($this->Employees->save($employee)) {
                $this->Flash->success(__('Employee work history has been saved.'));
                // $this->redirect(['action' => 'employeeAddress']);
            }            
        }
        
        $this->set(compact('employee','workCount'));
    }

    public function employeeChildrenDetails($employeeId = null)
    {
        $employee = $this->Employees->get($employeeId, [
            'contain' => ['NextOfKins', 'WorkDetails', 'Educations', 'ChildrenDetails', 'Addresses', 'OtherDepartments.Sections'],
        ]);

        $childCount         = count($employee->children_details) ? count($employee->children_details) : 0;

        // debug($employeeData);
        if ($this->request->is('post') && $this->request->getData('childCount')) {
            $childCount = $this->request->getData('childCount');
        }

        if ($this->request->is(['patch', 'post', 'put']) && !$this->request->getData('childCount')) {
            $employee = $this->Employees->patchEntity($employee,$this->request->getData());
            if ($this->Employees->save($employee)) {
                $this->Flash->success(__('Employee children information has been saved.'));
                // $this->redirect(['action' => 'employeeAddress']);
            }            
        }

        $genders = $this->Employees->Genders->find('list', ['limit' => 200]);
        
        $this->set(compact('employee','childCount','genders'));
    }

    public function employeeEducationHistory($employeeId = null)
    {
        $employee = $this->Employees->get($employeeId, [
            'contain' => ['NextOfKins', 'WorkDetails', 'Educations', 'ChildrenDetails', 'Addresses', 'OtherDepartments.Sections'],
        ]);

        $educationCount  = count($employee->educations) ? count($employee->educations) : 1;

        // debug($employeeData);
        if ($this->request->is('post') && $this->request->getData('educationCount')) {
            $educationCount = $this->request->getData('educationCount');
        }

        if ($this->request->is(['patch', 'post', 'put']) && !$this->request->getData('educationCount')) {
            $employee = $this->Employees->patchEntity($employee,$this->request->getData());
            if ($this->Employees->save($employee)) {
                $this->Flash->success(__('Employee Education history has been saved.'));
                // $this->redirect(['action' => 'employeeAddress']);
            }            
        }

        $files = 4;

        $highestEducations = $this->Employees->HighestEducations->find('list', ['limit' => 200, 'order' => 'name']);
        
        $this->set(compact('employee','educationCount','highestEducations','files'));
    }

    public function employeeOtherDepartments($employeeId = null)
    {
        $employee = $this->Employees->get($employeeId);$employee = $this->Employees->get($employeeId, [
            'contain' => ['NextOfKins', 'WorkDetails', 'Educations', 'ChildrenDetails', 'Addresses', 'OtherDepartments.Sections'],
        ]);

        $otherDepartmentCount = count($employee->other_departments) ? count($employee->other_departments) : 1;

        // debug($employeeData);
        if ($this->request->is('post') && $this->request->getData('otherDepartmentCount')) {
            $otherDepartmentCount = $this->request->getData('otherDepartmentCount');            
        }

        if ($this->request->is(['patch', 'post', 'put']) && !$this->request->getData('otherDepartmentCount')) {
            $employee = $this->Employees->patchEntity($employee,$this->request->getData());
            if ($this->Employees->save($employee)) {
                $this->Flash->success(__('Employee Other deparment information.'));
                // $this->redirect(['action' => 'employeeAddress']);
            }            
        }

        $departments = $this->Employees->Sections->find('list', ['limit' => 200, 'order' => 'name']);

        $this->set(compact('employee','departments','otherDepartmentCount'));
    }

    public function registrationFinalStep($employeeId = null)
    {
        $employee = $this->Employees->get($employeeId);

        if ($this->request->is('post')) {

            $employeeData = array_merge(
                $biodata, //20
                $payroll, //10
                $addresses, //10
                $nextOfKin, //10
                $workHistory, //10
                $childrenDetails, //10
                $educationHistory, //10
                $otherDepartments, //10
                $this->request->getData() //10
            );

            // debug($employeeData);exit;

            // ... Validation and employee creation logic ...

            $employee = $this->Employees->patchEntity($employee,$employeeData,[
                'associated' => [
                    'Addresses',
                    'NextOfKins',
                    'WorkDetails',
                    'ChildrenDetails',
                    'Educations',
                    'OtherDepartments'
                ]
            ]);

            if ($this->Employees->save($employee)) {
                $this->Flash->success(__('Employee registration successful.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Failed to register employee. Please correct the errors.'));
            }
        }

        $users = $this->Employees->Users->find('list', ['limit' => 200]);
        $banks = $this->Employees->Banks->find('list', ['limit' => 200])->all();

        $this->set(compact('employee','users','banks','employeeData'));
    }


    /**
     * 
     * Login
     */
    public function login()
    {
        
    }
    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Statuses','ReportsTos','Designations'],
            'limit' => 10
        ];
        $employees = $this->paginate($this->Employees);

        $this->set(compact('employees'));
    }

    /**
     * View method
     *
     * @param string|null $id Employee id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $employee = $this->Employees->get($id, [
            'contain' => ['ChildrenDetails','ReportsTos','Branches', 'Grades', 
            'Sections', 'Cadres', 'Banks', 'Genders', 'Religions', 'Locals', 
            'PhysicalPostures', 'MaritalStatuses', 'HighestEducations', 'Designations', 
            'Statuses', 'Users', 'Addresses', 'ChildrenDetails.Genders', 'Educations', 
            'Leaves.Statuses', 'NextOfKins.Relationships', 'OtherDepartments', 'Transactions', 'WorkDetails',
            'Addresses','ReportsTos','EmergencyContacts.Relationships','ServiceCharges'],
        ]);

        // $serviceChrageBrank = $this->Employees->ServiceCharges->find();

        // debug($serviceChrageBrank->all());

        $users = $this->Employees->Users->find('list', ['limit' => 200]);
        $banks = $this->Employees->Banks->find('list', ['limit' => 200])->all();

        $this->set(compact('employee',));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $session = $this->request->getSession();

        $employee = $this->Employees->newEmptyEntity();

        //step 1 data 
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $session->write('Employee.step1', $data);
            // $this->redirect(['action' => 'registrationStep2']);
            $this->Flash->success(__('Step1 data is saved, proceed to step 2'));
        }

        $step1Data = $session->read('Employee.step1');

        if (isset($employeeData['salary']) && $this->request->is('post')) {
            $data = $this->request->getData();
            $session->write('Employee.step2', $data);
            // $this->redirect(['action' => 'registrationStep2']);
            $this->Flash->success(__('Step2 data is saved, proceed to step 3'));
        }

        // debug(isset($employeeData['contribution']));

        if (isset($employeeData['contribution']) && $this->request->is('post')) {
            
            $employee = $this->Employees->patchEntity($employee, $this->request->getData());
            if ($this->Employees->save($employee)) {
                $this->Flash->success(__('The employee has been saved.'));

                // return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The employee could not be saved. Please, try again.'));
        }
        $users = $this->Employees->Users->find('list', ['limit' => 200]);
        $branches = $this->Employees->Branches->find('list', ['limit' => 200])->all();
        $grades = $this->Employees->Grades->find('list', ['limit' => 200])->all();
        $sections = $this->Employees->Sections->find('list', ['limit' => 200])->all();
        $cadres = $this->Employees->Cadres->find('list', ['limit' => 200])->all();
        $banks = $this->Employees->Banks->find('list', ['limit' => 200])->all();
        $service = $this->Employees->Banks->find('list', ['limit' => 200])->all();
        $genders = $this->Employees->Genders->find('list', ['limit' => 200])->all();
        $religions = $this->Employees->Religions->find('list', ['limit' => 200])->all();
        $locals = $this->Employees->Locals->find('list')->where(['Locals.state_id IS' => $employee->state_of_origin_id]);
        $stateoforigins = $this->Employees->StateOfOrigins->find('list', ['limit' => 200]);
        $departments = $this->Employees->Departments->find('list', ['limit' => 200])->all();
        $stateoforigins = $this->Employees->StateOfOrigins->find('list', ['limit' => 200]);
        $physicalPostures = $this->Employees->PhysicalPostures->find('list', ['limit' => 200])->all();
        $maritalStatuses = $this->Employees->MaritalStatuses->find('list', ['limit' => 200])->all();
        $highestEducations = $this->Employees->HighestEducations->find('list', ['limit' => 200])->all();
        $designations = $this->Employees->Designations->find('list', ['limit' => 200])->all();
        $statuses = $this->Employees->Statuses->find('list', ['limit' => 200])->all();
        $this->set(compact('users','departments','stateoforigins','employee', 'branches', 'grades', 'sections', 'cadres', 'banks', 'genders', 'religions', 'locals', 'physicalPostures', 'maritalStatuses', 'highestEducations', 'designations', 'statuses'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Employee id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        
        // debug($this->Employees->Addresses->validator()->remove('name'));
        // $this->Employees->Addresses->validator()->remove('name');
        //debug($this->Auth->user('role_id'));
        
        // debug($this->Employees->isAdmin);

        $employee = $this->Employees->get($id, [
            'contain' => ['NextOfKins', 'WorkDetails', 'Educations', 'ChildrenDetails', 'Addresses', 'OtherDepartments.Sections'],
        ]);

        $childCount         = count($employee->children_details) ? count($employee->children_details) : 0;
        $nextOfKinCount     = count($employee->next_of_kins) ? count($employee->next_of_kins) : 1;
        $educationCount     = count($employee->educations) ? count($employee->educations) : 1;
        $workCount          = count($employee->work_details) ? count($employee->work_details) : 1;
        $addressCount       = count($employee->addresses) ? count($employee->addresses) : 1;
        $otherDepartmentCount = count($employee->other_departments) ? count($employee->other_departments) : 1;

        if ($this->request->is('post') && $this->request->getData('educationCount')) {
            $educationCount = $this->request->getData('educationCount');
            //debug($this->request->getData());
            //exit;
        }
        if ($this->request->is('post') && $this->request->getData('workCount')) {
            $workCount = $this->request->getData('workCount');
            //debug($this->request->getData());s
            //exit;
        }
        if ($this->request->is('post') && $this->request->getData('childCount')) {
            $childCount = $this->request->getData('childCount');
            //debug($this->request->getData());s
            //exit;
        }
        if ($this->request->is('post') && $this->request->getData('addressCount')) {
            $addressCount = $this->request->getData('addressCount');
            //debug($this->request->getData());s
            //exit;
        }

        //debug(count($employee->children_details));
        if ($this->request->is(['patch', 'post', 'put']) && !$this->request->getData('workCount') && !$this->request->getData('childCount') && !$this->request->getData('educationCount')) {
            //debug($this->request->getData()); exit;
            $employee = $this->Employees->patchEntity($employee, $this->request->getData());
            if ($this->Employees->save($employee)) {
                $this->Flash->success(__('The employee has been saved.'));

                return $this->redirect(['action' => 'view', $employee->id]);
            }
            $this->Flash->error(__('The employee could not be saved. Please, try again.'));
        }

        $users = $this->Employees->Users->find('list', ['limit' => 200]);
        $branches = $this->Employees->Branches->find('list', ['limit' => 200])->all();
        $grades = $this->Employees->Grades->find('list', ['limit' => 200])->all();
        $sections = $this->Employees->Sections->find('list', ['limit' => 200])->all();
        $cadres = $this->Employees->Cadres->find('list', ['limit' => 200])->all();
        $banks = $this->Employees->Banks->find('list', ['limit' => 200])->all();
        $service = $this->Employees->Banks->find('list', ['limit' => 200])->all();
        $genders = $this->Employees->Genders->find('list', ['limit' => 200])->all();
        $religions = $this->Employees->Religions->find('list', ['limit' => 200])->all();
        $locals = $this->Employees->Locals->find('list')->where(['Locals.state_id IS' => $employee->state_of_origin_id]);
        $stateoforigins = $this->Employees->StateOfOrigins->find('list', ['limit' => 200]);
        $departments = $this->Employees->Departments->find('list', ['limit' => 200])->all();
        $stateoforigins = $this->Employees->StateOfOrigins->find('list', ['limit' => 200]);
        $physicalPostures = $this->Employees->PhysicalPostures->find('list', ['limit' => 200])->all();
        $maritalStatuses = $this->Employees->MaritalStatuses->find('list', ['limit' => 200])->all();
        $highestEducations = $this->Employees->HighestEducations->find('list', ['limit' => 200])->all();
        $designations = $this->Employees->Designations->find('list', ['limit' => 200])->all();
        $statuses = $this->Employees->Statuses->find('list', ['limit' => 200])->all();
        $this->set(compact('users','departments','stateoforigins','employee', 'branches', 'grades', 'sections', 'cadres', 'banks', 'genders', 'religions', 'locals', 'physicalPostures', 'maritalStatuses', 'highestEducations', 'designations', 'statuses'));
        if ($this->request->is('ajax')) {
            return $this->response->withType('application/json')
                ->withStringBody(json_encode([$viewVars]));
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Employee id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $employee = $this->Employees->get($id);
        if ($this->Employees->delete($employee)) {
            $this->Flash->success(__('The employee has been deleted.'));
        } else {
            $this->Flash->error(__('The employee could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function ajax()
    {

        $this->autoRender = false;
        $stateId = $this->request->getData('data');

        $locals = $this->Employees->Locals->find()->where(['Locals.state_id' => $stateId])->toArray();

        $json_data = json_encode($locals);
        $response = $this->response->withType('json')->withStringBody($json_data);
        return $response;
    }
}
