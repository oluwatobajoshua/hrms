<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Applicants Controller
 *
 * @property \App\Model\Table\ApplicantsTable $Applicants
 * @method \App\Model\Entity\Applicant[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ApplicantsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['JobListings.Designations', 'Genders', 'MaritalStatuses', 'HighestEducations'],
        ];
        $applicants = $this->paginate($this->Applicants);

        $this->set(compact('applicants'));
    }

    /**
     * View method
     *
     * @param string|null $id Applicant id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $applicant = $this->Applicants->get($id, [
            'contain' => ['JobListings.Designations', 'Genders', 'MaritalStatuses', 'HighestEducations'],
        ]);

        $this->set(compact('applicant'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $applicant = $this->Applicants->newEmptyEntity();
        if ($this->request->is('post')) {
            $applicant = $this->Applicants->patchEntity($applicant, $this->request->getData());
            if ($this->Applicants->save($applicant)) {
                $this->Flash->success(__('The applicant has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The applicant could not be saved. Please, try again.'));
        }
        $jobListings = $this->Applicants->JobListings->find('list', ['limit' => 200])->all();
        $genders = $this->Applicants->Genders->find('list', ['limit' => 200])->all();
        $maritalStatuses = $this->Applicants->MaritalStatuses->find('list', ['limit' => 200])->all();
        $highestEducations = $this->Applicants->HighestEducations->find('list', ['limit' => 200])->all();
        $this->set(compact('applicant', 'jobListings', 'genders', 'maritalStatuses', 'highestEducations'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Applicant id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $applicant = $this->Applicants->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $applicant = $this->Applicants->patchEntity($applicant, $this->request->getData());
            if ($this->Applicants->save($applicant)) {
                $this->Flash->success(__('The applicant has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The applicant could not be saved. Please, try again.'));
        }
        $jobListings = $this->Applicants->JobListings->find('list', ['limit' => 200])->all();
        $genders = $this->Applicants->Genders->find('list', ['limit' => 200])->all();
        $maritalStatuses = $this->Applicants->MaritalStatuses->find('list', ['limit' => 200])->all();
        $highestEducations = $this->Applicants->HighestEducations->find('list', ['limit' => 200])->all();
        $this->set(compact('applicant', 'jobListings', 'genders', 'maritalStatuses', 'highestEducations'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Applicant id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $applicant = $this->Applicants->get($id);
        if ($this->Applicants->delete($applicant)) {
            $this->Flash->success(__('The applicant has been deleted.'));
        } else {
            $this->Flash->error(__('The applicant could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
