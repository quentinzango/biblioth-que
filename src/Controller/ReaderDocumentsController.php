<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * ReaderDocuments Controller
 *
 * @property \App\Model\Table\ReaderDocumentsTable $ReaderDocuments
 * @method \App\Model\Entity\ReaderDocument[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ReaderDocumentsController extends AppController
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
        $readerDocuments = $this->paginate($this->ReaderDocuments);

        $this->set(compact('readerDocuments'));
    }

    /**
     * View method
     *
     * @param string|null $id Reader Document id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $readerDocument = $this->ReaderDocuments->get($id, [
            'contain' => ['Users', 'Documents'],
        ]);

        $this->set(compact('readerDocument'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $readerDocument = $this->ReaderDocuments->newEmptyEntity();
        if ($this->request->is('post')) {
            $readerDocument = $this->ReaderDocuments->patchEntity($readerDocument, $this->request->getData());
            if ($this->ReaderDocuments->save($readerDocument)) {
                $this->Flash->success(__('The reader document has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The reader document could not be saved. Please, try again.'));
        }
        $users = $this->ReaderDocuments->Users->find('list', ['limit' => 200])->all();
        $documents = $this->ReaderDocuments->Documents->find('list', ['limit' => 200])->all();
        $this->set(compact('readerDocument', 'users', 'documents'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Reader Document id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $readerDocument = $this->ReaderDocuments->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $readerDocument = $this->ReaderDocuments->patchEntity($readerDocument, $this->request->getData());
            if ($this->ReaderDocuments->save($readerDocument)) {
                $this->Flash->success(__('The reader document has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The reader document could not be saved. Please, try again.'));
        }
        $users = $this->ReaderDocuments->Users->find('list', ['limit' => 200])->all();
        $documents = $this->ReaderDocuments->Documents->find('list', ['limit' => 200])->all();
        $this->set(compact('readerDocument', 'users', 'documents'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Reader Document id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $readerDocument = $this->ReaderDocuments->get($id);
        if ($this->ReaderDocuments->delete($readerDocument)) {
            $this->Flash->success(__('The reader document has been deleted.'));
        } else {
            $this->Flash->error(__('The reader document could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
