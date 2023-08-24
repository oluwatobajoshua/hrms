<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * AttendanceRecords Controller
 *
 * @property \App\Model\Table\AttendanceRecordsTable $AttendanceRecords
 * @method \App\Model\Entity\AttendanceRecord[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AttendanceRecordsController extends AppController
{
    /**
     * Calculate total working hours for an attendance record.
     *
     * @param \App\Model\Entity\AttendanceRecord $attendanceRecord Attendance record entity
     * @return float Total working hours
     */
    private function calculateTotalWorkingHours($attendanceRecord)
    {
        // Logic to calculate total working hours based on check-in and check-out times
        $checkInTime = $attendanceRecord->check_in_time;
        $checkOutTime = $attendanceRecord->check_out_time;

        if ($checkInTime && $checkOutTime) {
            $checkInDateTime = strtotime($checkInTime);
            $checkOutDateTime = strtotime($checkOutTime);
            $secondsDiff = $checkOutDateTime - $checkInDateTime;
            return round($secondsDiff / 3600, 2); // Convert seconds to hours
        }

        return 0;
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Employees', 'Leaves'],
        ];
        $attendanceRecords = $this->paginate($this->AttendanceRecords);

        $this->set(compact('attendanceRecords'));
    }

    /**
     * View method
     *
     * @param string|null $id Attendance Record id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $attendanceRecord = $this->AttendanceRecords->get($id, [
            'contain' => ['Employees', 'Leaves'],
        ]);

        $this->set(compact('attendanceRecord'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $attendanceRecord = $this->AttendanceRecords->newEmptyEntity();

        if ($this->request->is('post')) {
            $attendanceData = $this->request->getData(); // Get submitted data
            $attendanceRecord = $this->AttendanceRecords->patchEntity($attendanceRecord, $attendanceData);

            // Perform calculations before saving
            $attendanceRecord->total_working_hours = $this->calculateTotalWorkingHours($attendanceData);
            $attendanceRecord->lateness_duration = $this->calculateLatenessDuration($employeeId,$attendanceData);
            // ... perform other calculations if needed

            if ($this->AttendanceRecords->save($attendanceRecord)) {
                $this->Flash->success(__('The attendance record has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The attendance record could not be saved. Please, try again.'));
        }

        $employees = $this->AttendanceRecords->Employees->find('list', ['limit' => 200]);
        $this->set(compact('attendanceRecord', 'employees'));
    }
    

    /**
     * Calculate lateness duration for an attendance record.
     *
     * @param \App\Model\Entity\AttendanceRecord $attendanceRecord Attendance record entity
     * @return string Lateness duration (HH:MM:SS)
     */
    private function calculateLatenessDuration($employeeId,$attendanceRecord)
    {
        $checkInTime = $attendanceRecord->check_in_time;
        $expectedCheckInTime = $this->getExpectedCheckInTime($employeeId,$attendanceRecord->date); // You need to implement this

        if ($checkInTime && $expectedCheckInTime) {
            $checkInDateTime = Time::createFromFormat('H:i:s', $checkInTime);
            $expectedCheckInDateTime = Time::createFromFormat('H:i:s', $expectedCheckInTime);
            $lateness = $checkInDateTime->diff($expectedCheckInDateTime);
            return $lateness->format('%H:%I:%S');
        }

        return '00:00:00';
    }

    private function getExpectedCheckInTime($employeeId, $attendanceDate)
    {
        // Fetch employee's shift from the employee_shifts table
        $employeeShift = $this->AttendanceRecords->Employees->EmployeeShifts->find()
            ->where([
                'employee_id' => $employeeId,
                'start_date <=' => $attendanceDate,
                'end_date >=' => $attendanceDate,
            ])
            ->first();

        if ($employeeShift) {
            return Time::parse($employeeShift->expected_check_in_time);
        } else {
            // If no shift is defined for the employee on the given date, return a default time
            return Time::parse('09:00:00');
        }
    }

    

    /**
     * Edit method
     *
     * @param string|null $id Attendance Record id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $attendanceRecord = $this->AttendanceRecords->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $attendanceRecord = $this->AttendanceRecords->patchEntity($attendanceRecord, $this->request->getData());
            if ($this->AttendanceRecords->save($attendanceRecord)) {
                $this->Flash->success(__('The attendance record has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The attendance record could not be saved. Please, try again.'));
        }
        $employees = $this->AttendanceRecords->Employees->find('list', ['limit' => 200])->all();
        $leaves = $this->AttendanceRecords->Leaves->find('list', ['limit' => 200])->all();
        $this->set(compact('attendanceRecord', 'employees', 'leaves'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Attendance Record id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $attendanceRecord = $this->AttendanceRecords->get($id);
        if ($this->AttendanceRecords->delete($attendanceRecord)) {
            $this->Flash->success(__('The attendance record has been deleted.'));
        } else {
            $this->Flash->error(__('The attendance record could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
