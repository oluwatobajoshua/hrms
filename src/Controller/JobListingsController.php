<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * JobListings Controller
 *
 * @property \App\Model\Table\JobListingsTable $JobListings
 * @method \App\Model\Entity\JobListing[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class JobListingsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Designations'],
        ];
        $jobListings = $this->paginate($this->JobListings);

        $this->set(compact('jobListings'));
    }

    /**
     * View method
     *
     * @param string|null $id Job Listing id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $jobListing = $this->JobListings->get($id, [
            'contain' => ['Designations', 'Applicants', 'Stages'],
        ]);

        $this->set(compact('jobListing'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $jobListing = $this->JobListings->newEmptyEntity();
        if ($this->request->is('post')) {
            $jobListing = $this->JobListings->patchEntity($jobListing, $this->request->getData());
            if ($this->JobListings->save($jobListing)) {
                $this->Flash->success(__('The job listing has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The job listing could not be saved. Please, try again.'));
        }
        $designations = $this->JobListings->Designations->find('list', ['limit' => 200])->all();
        $this->set(compact('jobListing', 'designations'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Job Listing id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $jobListing = $this->JobListings->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $jobListing = $this->JobListings->patchEntity($jobListing, $this->request->getData());
            if ($this->JobListings->save($jobListing)) {
                $this->Flash->success(__('The job listing has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The job listing could not be saved. Please, try again.'));
        }
        $designations = $this->JobListings->Designations->find('list', ['limit' => 200])->all();
        $this->set(compact('jobListing', 'designations'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Job Listing id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $jobListing = $this->JobListings->get($id);
        if ($this->JobListings->delete($jobListing)) {
            $this->Flash->success(__('The job listing has been deleted.'));
        } else {
            $this->Flash->error(__('The job listing could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
