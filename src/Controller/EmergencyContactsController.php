<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * EmergencyContacts Controller
 *
 * @property \App\Model\Table\EmergencyContactsTable $EmergencyContacts
 * @method \App\Model\Entity\EmergencyContact[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EmergencyContactsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Employees', 'Relationships'],
        ];
        $emergencyContacts = $this->paginate($this->EmergencyContacts);

        $this->set(compact('emergencyContacts'));
    }

    /**
     * View method
     *
     * @param string|null $id Emergency Contact id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $emergencyContact = $this->EmergencyContacts->get($id, [
            'contain' => ['Employees', 'Relationships'],
        ]);

        $this->set(compact('emergencyContact'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $emergencyContact = $this->EmergencyContacts->newEmptyEntity();
        if ($this->request->is('post')) {
            $emergencyContact = $this->EmergencyContacts->patchEntity($emergencyContact, $this->request->getData());
            if ($this->EmergencyContacts->save($emergencyContact)) {
                $this->Flash->success(__('The emergency contact has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The emergency contact could not be saved. Please, try again.'));
        }
        $employees = $this->EmergencyContacts->Employees->find('list', ['limit' => 200])->all();
        $relationships = $this->EmergencyContacts->Relationships->find('list', ['limit' => 200])->all();
        $this->set(compact('emergencyContact', 'employees', 'relationships'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Emergency Contact id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $emergencyContact = $this->EmergencyContacts->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $emergencyContact = $this->EmergencyContacts->patchEntity($emergencyContact, $this->request->getData());
            if ($this->EmergencyContacts->save($emergencyContact)) {
                $this->Flash->success(__('The emergency contact has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The emergency contact could not be saved. Please, try again.'));
        }
        $employees = $this->EmergencyContacts->Employees->find('list', ['limit' => 200])->all();
        $relationships = $this->EmergencyContacts->Relationships->find('list', ['limit' => 200])->all();
        $this->set(compact('emergencyContact', 'employees', 'relationships'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Emergency Contact id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $emergencyContact = $this->EmergencyContacts->get($id);
        if ($this->EmergencyContacts->delete($emergencyContact)) {
            $this->Flash->success(__('The emergency contact has been deleted.'));
        } else {
            $this->Flash->error(__('The emergency contact could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
