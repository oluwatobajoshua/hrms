<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Bonuses Controller
 *
 * @property \App\Model\Table\BonusesTable $Bonuses
 * @method \App\Model\Entity\Bonus[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BonusesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Employees', 'Statuses'],
        ];
        $bonuses = $this->paginate($this->Bonuses);

        $this->set(compact('bonuses'));
    }

    /**
     * View method
     *
     * @param string|null $id Bonus id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $bonus = $this->Bonuses->get($id, [
            'contain' => ['Employees', 'Statuses'],
        ]);

        $this->set(compact('bonus'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $bonus = $this->Bonuses->newEmptyEntity();
        if ($this->request->is('post')) {
            $bonus = $this->Bonuses->patchEntity($bonus, $this->request->getData());
            if ($this->Bonuses->save($bonus)) {
                $this->Flash->success(__('The bonus has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bonus could not be saved. Please, try again.'));
        }
        $employees = $this->Bonuses->Employees->find('list', ['limit' => 200])->all();
        $statuses = $this->Bonuses->Statuses->find('list', ['limit' => 200])->all();
        $this->set(compact('bonus', 'employees', 'statuses'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Bonus id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $bonus = $this->Bonuses->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $bonus = $this->Bonuses->patchEntity($bonus, $this->request->getData());
            if ($this->Bonuses->save($bonus)) {
                $this->Flash->success(__('The bonus has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bonus could not be saved. Please, try again.'));
        }
        $employees = $this->Bonuses->Employees->find('list', ['limit' => 200])->all();
        $statuses = $this->Bonuses->Statuses->find('list', ['limit' => 200])->all();
        $this->set(compact('bonus', 'employees', 'statuses'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Bonus id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $bonus = $this->Bonuses->get($id);
        if ($this->Bonuses->delete($bonus)) {
            $this->Flash->success(__('The bonus has been deleted.'));
        } else {
            $this->Flash->error(__('The bonus could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
