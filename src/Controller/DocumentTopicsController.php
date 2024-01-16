<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * DocumentTopics Controller
 *
 * @property \App\Model\Table\DocumentTopicsTable $DocumentTopics
 * @method \App\Model\Entity\DocumentTopic[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DocumentTopicsController extends AppController
{
    public $DocumentTopics;
    public function initialize(): void
    {
        parent::initialize();
        $this->DocumentTopics = $this->getTableLocator()->get('DocumentTopics');
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->Authorization->SkipAuthorization();
        $this->paginate = [
            'contain' => ['Documents', 'Topics'],
        ];
        $documentTopics = $this->paginate($this->DocumentTopics);

        $this->set(compact('documentTopics'));
    }

    /**
     * View method
     *
     * @param string|null $id Document Topic id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->Authorization->SkipAuthorization();
        $documentTopic = $this->DocumentTopics->get($id, [
            'contain' => ['Documents', 'Topics'],
        ]);

        $this->set(compact('documentTopic'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->Authorization->SkipAuthorization();
        $documentTopic = $this->DocumentTopics->newEmptyEntity();
        if ($this->request->is('post')) {
            $documentTopic = $this->DocumentTopics->patchEntity($documentTopic, $this->request->getData());
            if ($this->DocumentTopics->save($documentTopic)) {
                $this->Flash->success(__('The document topic has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The document topic could not be saved. Please, try again.'));
        }
        $documents = $this->DocumentTopics->Documents->find('list', ['limit' => 200])->all();
        $topics = $this->DocumentTopics->Topics->find('list', ['limit' => 200])->all();
        $this->set(compact('documentTopic', 'documents', 'topics'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Document Topic id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->Authorization->SkipAuthorization();
        $documentTopic = $this->DocumentTopics->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $documentTopic = $this->DocumentTopics->patchEntity($documentTopic, $this->request->getData());
            if ($this->DocumentTopics->save($documentTopic)) {
                $this->Flash->success(__('The document topic has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The document topic could not be saved. Please, try again.'));
        }
        $documents = $this->DocumentTopics->Documents->find('list', ['limit' => 200])->all();
        $topics = $this->DocumentTopics->Topics->find('list', ['limit' => 200])->all();
        $this->set(compact('documentTopic', 'documents', 'topics'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Document Topic id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->Authorization->SkipAuthorization();
        $this->request->allowMethod(['post', 'delete']);
        $documentTopic = $this->DocumentTopics->get($id);
        if ($this->DocumentTopics->delete($documentTopic)) {
            $this->Flash->success(__('The document topic has been deleted.'));
        } else {
            $this->Flash->error(__('The document topic could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
