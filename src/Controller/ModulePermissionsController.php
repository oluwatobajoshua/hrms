<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * ModulePermissions Controller
 *
 * @property \App\Model\Table\ModulePermissionsTable $ModulePermissions
 * @method \App\Model\Entity\ModulePermission[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ModulePermissionsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Roles', 'Modules'],
        ];
        $modulePermissions = $this->paginate($this->ModulePermissions);

        $this->set(compact('modulePermissions'));
    }

    /**
     * View method
     *
     * @param string|null $id Module Permission id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $modulePermission = $this->ModulePermissions->get($id, [
            'contain' => ['Roles', 'Modules'],
        ]);

        $this->set(compact('modulePermission'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $modulePermission = $this->ModulePermissions->newEmptyEntity();
        if ($this->request->is('post')) {
            $modulePermission = $this->ModulePermissions->patchEntity($modulePermission, $this->request->getData());
            if ($this->ModulePermissions->save($modulePermission)) {
                $this->Flash->success(__('The module permission has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The module permission could not be saved. Please, try again.'));
        }
        $roles = $this->ModulePermissions->Roles->find('list', ['limit' => 200])->all();
        $modules = $this->ModulePermissions->Modules->find('list', ['limit' => 200])->all();
        $this->set(compact('modulePermission', 'roles', 'modules'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Module Permission id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $modulePermission = $this->ModulePermissions->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $modulePermission = $this->ModulePermissions->patchEntity($modulePermission, $this->request->getData());
            if ($this->ModulePermissions->save($modulePermission)) {
                $this->Flash->success(__('The module permission has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The module permission could not be saved. Please, try again.'));
        }
        $roles = $this->ModulePermissions->Roles->find('list', ['limit' => 200])->all();
        $modules = $this->ModulePermissions->Modules->find('list', ['limit' => 200])->all();
        $this->set(compact('modulePermission', 'roles', 'modules'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Module Permission id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $modulePermission = $this->ModulePermissions->get($id);
        if ($this->ModulePermissions->delete($modulePermission)) {
            $this->Flash->success(__('The module permission has been deleted.'));
        } else {
            $this->Flash->error(__('The module permission could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
