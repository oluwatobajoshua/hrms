<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * EmployeeSalaryComponents Controller
 *
 * @property \App\Model\Table\EmployeeSalaryComponentsTable $EmployeeSalaryComponents
 * @method \App\Model\Entity\EmployeeSalaryComponent[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EmployeeSalaryComponentsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Employees', 'SalaryComponents'],
        ];
        $employeeSalaryComponents = $this->paginate($this->EmployeeSalaryComponents);

        $this->set(compact('employeeSalaryComponents'));
    }

    /**
     * View method
     *
     * @param string|null $id Employee Salary Component id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $employeeSalaryComponent = $this->EmployeeSalaryComponents->get($id, [
            'contain' => ['Employees', 'SalaryComponents'],
        ]);

        $this->set(compact('employeeSalaryComponent'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $employeeSalaryComponent = $this->EmployeeSalaryComponents->newEmptyEntity();
        if ($this->request->is('post')) {
            $employeeSalaryComponent = $this->EmployeeSalaryComponents->patchEntity($employeeSalaryComponent, $this->request->getData());
            if ($this->EmployeeSalaryComponents->save($employeeSalaryComponent)) {
                $this->Flash->success(__('The employee salary component has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The employee salary component could not be saved. Please, try again.'));
        }
        $employees = $this->EmployeeSalaryComponents->Employees->find('list', ['limit' => 200])->all();
        $salaryComponents = $this->EmployeeSalaryComponents->SalaryComponents->find('list', ['limit' => 200])->all();
        $this->set(compact('employeeSalaryComponent', 'employees', 'salaryComponents'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Employee Salary Component id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $employeeSalaryComponent = $this->EmployeeSalaryComponents->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $employeeSalaryComponent = $this->EmployeeSalaryComponents->patchEntity($employeeSalaryComponent, $this->request->getData());
            if ($this->EmployeeSalaryComponents->save($employeeSalaryComponent)) {
                $this->Flash->success(__('The employee salary component has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The employee salary component could not be saved. Please, try again.'));
        }
        $employees = $this->EmployeeSalaryComponents->Employees->find('list', ['limit' => 200])->all();
        $salaryComponents = $this->EmployeeSalaryComponents->SalaryComponents->find('list', ['limit' => 200])->all();
        $this->set(compact('employeeSalaryComponent', 'employees', 'salaryComponents'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Employee Salary Component id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $employeeSalaryComponent = $this->EmployeeSalaryComponents->get($id);
        if ($this->EmployeeSalaryComponents->delete($employeeSalaryComponent)) {
            $this->Flash->success(__('The employee salary component has been deleted.'));
        } else {
            $this->Flash->error(__('The employee salary component could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
