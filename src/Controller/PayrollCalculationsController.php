<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * PayrollCalculations Controller
 *
 * @property \App\Model\Table\PayrollCalculationsTable $PayrollCalculations
 * @method \App\Model\Entity\PayrollCalculation[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PayrollCalculationsController extends AppController
{
    public function calculate()
    {
        $this->loadModel('Employees');
        $this->loadModel('SalaryComponents');
        $this->loadModel('EmployeeSalaryComponents');
        $this->loadModel('AttendanceRecords');
        $this->loadModel('PayrollCalculations');

        // Fetch all employees
        $employees = $this->Employees->find('all')->toArray();

        // Loop through employees and calculate payroll
        foreach ($employees as $employee) {
            // Fetch salary components for the employee
            $salaryComponents = $this->EmployeeSalaryComponents
                ->find('all')
                ->contain('SalaryComponents')
                ->where(['SalaryComponents.employee_id' => $employee->id])
                ->toArray();

            // Calculate earnings (allowances) and deductions
            $totalEarnings = 0;
            $totalDeductions = 0;

            foreach ($salaryComponents as $component) {
                $componentAmount = $component->salary_component->amount;

                if ($component->salary_component->type === 'earning') {
                    // Earnings (allowances)
                    $totalEarnings += $componentAmount;
                } elseif ($component->salary_component->type === 'deduction') {
                    // Deductions
                    $totalDeductions += $componentAmount;
                }
            }

            // Fetch attendance records for the employee (example)
            $attendanceRecords = $this->AttendanceRecords
                ->find('all')
                ->where(['employee_id' => $employee->id])
                ->toArray();

            // Calculate additional earnings (example: incentives)
            $additionalEarnings = 0;
            foreach ($attendanceRecords as $attendanceRecord) {
                // Calculate additional earnings based on business logic
                $additionalEarnings += $attendanceRecord->incentives;
            }

            // Calculate net pay
            $netPay = $totalEarnings - $totalDeductions + $additionalEarnings;

            // Save payroll calculation for the employee
            $payrollCalculation = $this->PayrollCalculations->newEntity([
                'employee_id' => $employee->id,
                'earnings' => $totalEarnings,
                'deductions' => $totalDeductions,
                'additional_earnings' => $additionalEarnings,
                'net_pay' => $netPay,
            ]);
            $this->PayrollCalculations->save($payrollCalculation);
        }

        $this->Flash->success(__('Payroll calculations have been completed.'));
        return $this->redirect(['action' => 'index']);
    }

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
        $payrollCalculations = $this->paginate($this->PayrollCalculations);

        $this->set(compact('payrollCalculations'));
    }

    /**
     * View method
     *
     * @param string|null $id Payroll Calculation id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $payrollCalculation = $this->PayrollCalculations->get($id, [
            'contain' => ['Employees'],
        ]);

        $this->set(compact('payrollCalculation'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $payrollCalculation = $this->PayrollCalculations->newEmptyEntity();
        if ($this->request->is('post')) {
            $payrollCalculation = $this->PayrollCalculations->patchEntity($payrollCalculation, $this->request->getData());
            if ($this->PayrollCalculations->save($payrollCalculation)) {
                $this->Flash->success(__('The payroll calculation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The payroll calculation could not be saved. Please, try again.'));
        }
        $employees = $this->PayrollCalculations->Employees->find('list', ['limit' => 200])->all();
        $this->set(compact('payrollCalculation', 'employees'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Payroll Calculation id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $payrollCalculation = $this->PayrollCalculations->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $payrollCalculation = $this->PayrollCalculations->patchEntity($payrollCalculation, $this->request->getData());
            if ($this->PayrollCalculations->save($payrollCalculation)) {
                $this->Flash->success(__('The payroll calculation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The payroll calculation could not be saved. Please, try again.'));
        }
        $employees = $this->PayrollCalculations->Employees->find('list', ['limit' => 200])->all();
        $this->set(compact('payrollCalculation', 'employees'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Payroll Calculation id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $payrollCalculation = $this->PayrollCalculations->get($id);
        if ($this->PayrollCalculations->delete($payrollCalculation)) {
            $this->Flash->success(__('The payroll calculation has been deleted.'));
        } else {
            $this->Flash->error(__('The payroll calculation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
