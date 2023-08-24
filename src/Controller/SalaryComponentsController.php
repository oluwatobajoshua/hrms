<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * SalaryComponents Controller
 *
 * @property \App\Model\Table\SalaryComponentsTable $SalaryComponents
 * @method \App\Model\Entity\SalaryComponent[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SalaryComponentsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Employees'],
        ];
        $salaryComponents = $this->paginate($this->SalaryComponents);

        $this->set(compact('salaryComponents'));
    }

    /**
     * View method
     *
     * @param string|null $id Salary Component id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $salaryComponent = $this->SalaryComponents->get($id, [
            'contain' => ['Employees', 'EmployeeSalaryComponents'],
        ]);

        $this->set(compact('salaryComponent'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $salaryComponent = $this->SalaryComponents->newEmptyEntity();
        if ($this->request->is('post')) {
            $salaryComponent = $this->SalaryComponents->patchEntity($salaryComponent, $this->request->getData());
            if ($this->SalaryComponents->save($salaryComponent)) {
                $this->Flash->success(__('The salary component has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The salary component could not be saved. Please, try again.'));
        }
        $employees = $this->SalaryComponents->Employees->find('list', ['limit' => 200])->all();
        $this->set(compact('salaryComponent', 'employees'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Salary Component id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $salaryComponent = $this->SalaryComponents->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $salaryComponent = $this->SalaryComponents->patchEntity($salaryComponent, $this->request->getData());
            if ($this->SalaryComponents->save($salaryComponent)) {
                $this->Flash->success(__('The salary component has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The salary component could not be saved. Please, try again.'));
        }
        $employees = $this->SalaryComponents->Employees->find('list', ['limit' => 200])->all();
        $this->set(compact('salaryComponent', 'employees'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Salary Component id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $salaryComponent = $this->SalaryComponents->get($id);
        if ($this->SalaryComponents->delete($salaryComponent)) {
            $this->Flash->success(__('The salary component has been deleted.'));
        } else {
            $this->Flash->error(__('The salary component could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
