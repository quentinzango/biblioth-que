<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\Http\Exception\NotFoundException;

/**
 * Documents Controller
 *
 * @property \App\Model\Table\DocumentsTable $Documents
 * @method \App\Model\Entity\Document[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DocumentsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */

    public function affich(){
        $this->Authorization->SkipAuthorization();
    }

    public function index()
    {
        $this->Authorization->SkipAuthorization();
        $key = $this->request->getQuery('key');
        if ($key) {
            $query  = $this->Documents->find('all')
                ->where(['Or' => ['titre like' => '%' . $key . '%', 'author like' => '%' . $key . '%']]);
        } else {
            $query = $this->Documents;
        }
        $this->paginate = [
            'contain' => ['Users', 'DocumentCategories'],
        ];
        $documents = $this->Paginator->paginate($this->Documents->find());

        $this->set(compact('documents', 'key'));
    }

    /**
     * View method
     *
     * @param string|null $id Document id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($slug = null)
    {
        $this->Authorization->SkipAuthorization();
        $document = $this->Documents->get($slug, [
            'contain' => ['Users', 'DocumentCategories', 'DocumentComments', 'DocumentTopics', 'ReaderDocuments'],
        ]);
        $document = $this->Documents->findBySlug($slug)->firstOrFail();
        $this->set(compact('document'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->Authorization->SkipAuthorization();
        $document = $this->Documents->newEmptyEntity();

        if ($this->request->is('post')) {
            $document = $this->Documents->patchEntity($document, $this->request->getData());
            //traitement de l'upload de la photo de couverture
            $coverPhotoFile = $this->request->getData('cover_photo');
            if (!empty($coverPhotoFile)) {
                $coverPhoto = new \stdClass();
                $coverPhoto->file_path = $this->uploadCoverPhoto($coverPhotoFile);

                $document->cover_photo = $coverPhoto;
            }
            if ($this->Documents->save($document)) {
                $this->Flash->success(__('The document has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The document could not be saved. Please, try again.'));
        }
        $users = $this->Documents->Users->find('list', ['limit' => 200])->all();
        $documentCategories = $this->Documents->DocumentCategories->find('list', ['limit' => 200])->all();
        $this->set(compact('document', 'users', 'documentCategories'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Document id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id)
    {
        $this->Authorization->SkipAuthorization();
        $document = $this->Documents->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $document = $this->Documents->patchEntity($document, $this->request->getData());
            $coverPhotoFile = $this->request->getData('cover_photo');
            if (!empty($coverPhotoFile)) {
                $coverPhoto = new \stdClass();
                $coverPhoto->file_path = $this->uploadCoverPhoto($coverPhotoFile);
                $document->cover_photo = $coverPhoto;
            }
            if ($this->Documents->save($document)) {
                $this->Flash->success(__('The document has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The document could not be saved. Please, try again.'));
        }
        $users = $this->Documents->Users->find('list', ['limit' => 200])->all();
        $documentCategories = $this->Documents->DocumentCategories->find('list', ['limit' => 200])->all();
        $this->set(compact('document', 'users', 'documentCategories'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Document id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($slug)
    {
        $this->Authorization->SkipAuthorization();
        $this->request->allowMethod(['post', 'delete']);
        $document = $this->Documents->get($slug);
        if ($this->Documents->delete($document)) {
            $this->Flash->success(__('The document has been deleted.'));
        } else {
            $this->Flash->error(__('The document could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function download($id)
    {
        $this->Authorization->SkipAuthorization();
        $document = $this->Documents->get($id);

        $filepath = WWW_ROOT . 'uploads' . 'DS' . $document->slug;
        $this->response = $this->response->withFile(
            $filepath,
            ['download' => true, 'name' => $document->file_name]
        );

        return $this->response;
    }

    public function uploadCoverphoto($coverPhoto)
    {
        $this->Authorization->SkipAuthorization();
        //vérifie si une image a été soumise via le formulaire
        if($this->request->is('post')) {
            $document = $this->Documents->get($this->request->getData('document_id'));
            $coverphoto = $this->request->getData('coverphoto');
            //vérifie si l
            $fileName = $coverphoto->getClientFilename();
            $targetpath = WWW_ROOT . 'uploads' . 'DS' . 'cover_photos' . DS;
            $coverPhoto->moveTo($targetpath . $fileName);

            $document->coverphoto = $fileName;
            if($this->Documents->save($document)){
                $this->Flash->success(__('la photo de couvrture a été téléchargée.'));
                return $this->redirect((['action' => 'view', $document->idt]));
            }else{
                $this->Flash->error(__('Une erreur s\'est produite lors du téléchargement de la photo de couverture.'));
            }
                }
    }
}
