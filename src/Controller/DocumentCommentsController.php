<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * DocumentComments Controller
 *
 * @property \App\Model\Table\DocumentCommentsTable $DocumentComments
 * @method \App\Model\Entity\DocumentComment[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DocumentCommentsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Documents'],
        ];
        $documentComments = $this->paginate($this->DocumentComments);

        $this->set(compact('documentComments'));
    }

    /**
     * View method
     *
     * @param string|null $id Document Comment id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $documentComment = $this->DocumentComments->get($id, [
            'contain' => ['Users', 'Documents'],
        ]);

        $this->set(compact('documentComment'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $documentComment = $this->DocumentComments->newEmptyEntity();
        if ($this->request->is('post')) {
            $documentComment = $this->DocumentComments->patchEntity($documentComment, $this->request->getData());
            if ($this->DocumentComments->save($documentComment)) {
                $this->Flash->success(__('The document comment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The document comment could not be saved. Please, try again.'));
        }
        $users = $this->DocumentComments->Users->find('list', ['limit' => 200])->all();
        $documents = $this->DocumentComments->Documents->find('list', ['limit' => 200])->all();
        $this->set(compact('documentComment', 'users', 'documents'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Document Comment id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $documentComment = $this->DocumentComments->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $documentComment = $this->DocumentComments->patchEntity($documentComment, $this->request->getData());
            if ($this->DocumentComments->save($documentComment)) {
                $this->Flash->success(__('The document comment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The document comment could not be saved. Please, try again.'));
        }
        $users = $this->DocumentComments->Users->find('list', ['limit' => 200])->all();
        $documents = $this->DocumentComments->Documents->find('list', ['limit' => 200])->all();
        $this->set(compact('documentComment', 'users', 'documents'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Document Comment id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $documentComment = $this->DocumentComments->get($id);
        if ($this->DocumentComments->delete($documentComment)) {
            $this->Flash->success(__('The document comment has been deleted.'));
        } else {
            $this->Flash->error(__('The document comment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
