<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * PayrollPeriods Controller
 *
 * @property \App\Model\Table\PayrollPeriodsTable $PayrollPeriods
 * @method \App\Model\Entity\PayrollPeriod[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PayrollPeriodsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $payrollPeriods = $this->paginate($this->PayrollPeriods);

        $this->set(compact('payrollPeriods'));
    }

    /**
     * View method
     *
     * @param string|null $id Payroll Period id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $payrollPeriod = $this->PayrollPeriods->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('payrollPeriod'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $payrollPeriod = $this->PayrollPeriods->newEmptyEntity();
        if ($this->request->is('post')) {
            $payrollPeriod = $this->PayrollPeriods->patchEntity($payrollPeriod, $this->request->getData());
            if ($this->PayrollPeriods->save($payrollPeriod)) {
                $this->Flash->success(__('The payroll period has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The payroll period could not be saved. Please, try again.'));
        }
        $this->set(compact('payrollPeriod'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Payroll Period id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $payrollPeriod = $this->PayrollPeriods->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $payrollPeriod = $this->PayrollPeriods->patchEntity($payrollPeriod, $this->request->getData());
            if ($this->PayrollPeriods->save($payrollPeriod)) {
                $this->Flash->success(__('The payroll period has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The payroll period could not be saved. Please, try again.'));
        }
        $this->set(compact('payrollPeriod'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Payroll Period id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $payrollPeriod = $this->PayrollPeriods->get($id);
        if ($this->PayrollPeriods->delete($payrollPeriod)) {
            $this->Flash->success(__('The payroll period has been deleted.'));
        } else {
            $this->Flash->error(__('The payroll period could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
