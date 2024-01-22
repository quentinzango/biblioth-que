<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\Http\Exception\NotFoundException;
use Cake\Controller\ControllerInterface;
use Cake\Http\File;
use Cake\Http\ServerRequest;
use cake\Http\ServerRequestFactory;
use Cake\Http\UploadedFileInterface;
use Laminas\Diactoros\UploadedFile;
use Psr\Http\Message\UploadedFileInterface as MessageUploadedFileInterface;

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

    public function affich($id)
    {
        $this->Authorization->SkipAuthorization();
        $document = $this->Documents->get($id, [
            'contain' => ['Users', 'DocumentCategories', 'DocumentComments', 'DocumentTopics', 'ReaderDocuments'],
        ]);
        $this->set(compact('document'));
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
    public function view($id)
    {
        $this->Authorization->SkipAuthorization();
        $document = $this->Documents->get($id, [
            'contain' => ['Users', 'DocumentCategories', 'DocumentComments', 'DocumentTopics', 'ReaderDocuments'],
        ]);
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
            $document->user_id = $this->getRequest()->getSession()->read('Auth.User.id');

            //traitement de l'upload de la photo de couverture
            $coverPhotoFile = $this->request->getData('cover_photo');
            if (!empty($coverPhotoFile)) {

                //associer la photo de couverture au document
                $document->cover_photo = $this->uploadCoverPhoto($coverPhotoFile);
            } else {
                $this->Flash->success(__('la photo de couverture n\'a pas été ajouter'));
                return $this->redirect(['action' => 'add']);
            }
            
            //traitement de l'upload du document
            $exemplarydocumentFile = $this->request->getData('exemplary_document');
            if (!empty($exemplarydocumentFile)) {
                //associer l'exemplaire du document
                $document->exemplary_document = $this->uploadDocument($exemplarydocumentFile);
            } else {
                $this->Flash->success(__('l\'exemplaire du document n\'a pas été ajouter'));
                return $this->redirect(['action' => 'add']);
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
    public function edit($id = null)
    {
        $this->Authorization->SkipAuthorization();
        $document = $this->Documents->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $document = $this->Documents->patchEntity($document, $this->request->getData());
            //traitement de l'upload de la photo de couverture
            $coverPhotoFile = $this->request->getData('cover_photo');
            if (!empty($coverPhotoFile)) {
                //associer la photo de couverture au document
                $document->cover_photo = $this->uploadCoverPhoto($coverPhotoFile);
            } else {
                $this->Flash->success(__('la photo de couverture n\'a pas été ajouter'));
                return $this->redirect(['action' => 'edit']);
            }
            $exemplarydocumentFile = $this->request->getData('exemplary_document');
            if (!empty($exemplarydocumentFile)) {
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
    public function delete($id)
    {
        $this->Authorization->SkipAuthorization();
        $this->request->allowMethod(['post', 'delete']);
        $document = $this->Documents->get($id);
        if ($this->Documents->delete($document)) {
            $this->Flash->success(__('The document has been deleted.'));
        } else {
            $this->Flash->error(__('The document could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * @param UploadedFileInterface $exemplarydocument
     * @return string
     */
    public function uploadDocument(UploadedFile $exemplarydocument): string
    {
        $fileName = $exemplarydocument->getClientFilename();
        $path = WWW_ROOT . 'uploads' . DS . 'exemplarydocuments' . DS . $fileName;
        $exemplarydocument->moveTo($path);
        return $fileName;
    }

    /**
     * @param UploadedFileInterface $coverphoto
     * @return string
     */
    public function uploadCoverphoto(UploadedFile $coverphoto): string
    {

        $fileName = $coverphoto->getClientFilename();
        $targetpath = WWW_ROOT . 'uploads' . DS . 'coverphotos' . DS . $fileName;
        $coverphoto->moveTo($targetpath);

        return $fileName;
    }
}
