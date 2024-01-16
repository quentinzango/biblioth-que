<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * DocumentCategories Controller
 *
 * @property \App\Model\Table\DocumentCategoriesTable $DocumentCategories
 * @method \App\Model\Entity\DocumentCategory[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DocumentCategoriesController extends AppController
{
    public $DocumentCategories;

    public function initialize(): void
{
    parent::initialize();
    $this->DocumentCategories = $this->getTableLocator()->get('DocumentCategories');
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
            'contain' => ['DocumentTypes'],
        ];
        $documentCategories = $this->paginate($this->DocumentCategories);

        $this->set(compact('documentCategories'));
    }

    /**
     * View method
     *
     * @param string|null $id Document Category id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->Authorization->SkipAuthorization();
        $documentCategory = $this->DocumentCategories->get($id, [
            'contain' => ['DocumentTypes'],
        ]);

        $this->set(compact('documentCategory'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->Authorization->SkipAuthorization();
        $documentCategory = $this->DocumentCategories->newEmptyEntity();
        if ($this->request->is('post')) {
            $documentCategory = $this->DocumentCategories->patchEntity($documentCategory, $this->request->getData());
            if ($this->DocumentCategories->save($documentCategory)) {
                $this->Flash->success(__('The document category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The document category could not be saved. Please, try again.'));
        }
        $documentTypes = $this->DocumentCategories->DocumentTypes->find('list', ['limit' => 200])->all();
        $this->set(compact('documentCategory', 'documentTypes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Document Category id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->Authorization->SkipAuthorization();
        $documentCategory = $this->DocumentCategories->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $documentCategory = $this->DocumentCategories->patchEntity($documentCategory, $this->request->getData());
            if ($this->DocumentCategories->save($documentCategory)) {
                $this->Flash->success(__('The document category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The document category could not be saved. Please, try again.'));
        }
        $documentTypes = $this->DocumentCategories->DocumentTypes->find('list', ['limit' => 200])->all();
        $this->set(compact('documentCategory', 'documentTypes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Document Category id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->Authorization->SkipAuthorization();
        $this->request->allowMethod(['post', 'delete']);
        $documentCategory = $this->DocumentCategories->get($id);
        if ($this->DocumentCategories->delete($documentCategory)) {
            $this->Flash->success(__('The document category has been deleted.'));
        } else {
            $this->Flash->error(__('The document category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
