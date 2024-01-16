<?php

declare(strict_types=1);

namespace App\Controller;

use cake\Http\Session;
use cake\Event\EventInterface;
use cake\Controller\Controller;
use cake\Utility\Security;
use cake\Mailer\Mailer;
use cake\Utility\Text;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{


    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->Authorization->SkipAuthorization();
    }

    public function read()
    {
        $this->Authorization->SkipAuthorization();
    }

    public function list()
    {
        $this->Authorization->SkipAuthorization();
        $key = $this->request->getQuery('key');
        if ($key) {
            $query  = $this->Users->find('all')
                ->where(['Or' => ['name like' => '%' . $key . '%', 'email like' => '%' . $key . '%']]);
        } else {
            $query = $this->Users;
        }
        $this->paginate = [
            'contain' => ['Roles'],
        ];
        $users = $this->Paginator->paginate($this->Users->find());

        $this->set(compact('users'));
    }



    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id= null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Roles', 'DocumentComments', 'Documents', 'ReaderDocuments'],
        ]);

        $this->set(compact('user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->Authorization->SkipAuthorization();
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'list']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200])->all();
        $this->set(compact('user', 'roles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'list']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200])->all();
        $this->set(compact('user', 'roles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'list']);
    }

    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);

        $this->Authentication->allowUnauthenticated(['newpassword','resetpassword','forgotpassword','registration', 'login', 'add', 'index']);
    }

    public function login()
    {
        $this->Authorization->SkipAuthorization();
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();
        // indépendamment de POST ou GET, rediriger si l'utilisateur est connecté
        if ($result && $result->isValid()) {
            $session = new Session();
            $session->write('User.loggedIn', true);
            // rediriger vers /users après la connexion réussie
            $user = $result->getData();
            $role_id = $user->role_id;
            if ($user->role_id === 1) {
                $redirect = $this->request->getQuery('redirect', [
                    'controller' => 'Users',
                    'action' => 'list',
                ]);
            } else {
                $redirect = $this->request->getQuery('redirect', [
                    'controller' => 'Users',
                    'action' => 'read',
                ]);
            }
            return $this->redirect($redirect);
        }

        // afficher une erreur si l'utilisateur a soumis un formulaire
        // et que l'authentification a échoué
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Votre identifiant ou votre mot de passe est incorrect'));
        }
    }

    public function registration()
    {
        $this->Authorization->SkipAuthorization();
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $role = $this->Users->Roles->get(2);
            $user->set('role_id', $role->id);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'list']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
    }

    public function logout()
    {
        $this->Authorization->SkipAuthorization();
        $this->Authentication->logout();
        return $this->redirect(['controller' => 'Users', 'action' => 'login']);
    }

    public function contact()
    {
        $this->Authorization->SkipAuthorization();
    }

    public function userStatus($id = null, $status)
    {
        $this->request->allowMethod(['post']);
        $user = $this->users->get($id,);

        if ($status == 1)
            $user->status = 0;
        else
            $user->status = 1;

        if ($this->Users->save($user)) {
            $this->Flash->success(__('the users status has changed.'));
        }
        return $this->redirect(['action' => 'list']);
    }

    public function resetpassword(){
        $this->Authorization->SkipAuthorization();
        if ($this->request->is('post')){
            $email = $this->request->getData('email');
            //vérifier si l'utilisatuer existe avec cette adresse e-mail
            $user  = $this->Users->find()
                ->where(['email' => $email])->first();
            if(!$user){
                $this->Flash->error('Adresse e-mail invalide.');
                return $this->redirect(['action'=> 'resetpassword']);
            }
            //généré un token unique
            $token = Security::randomString(32);
            //Enregistrer le nouveau token et la date d'expiration dans la base de donneés
            $user->token = $token;
            $user->token_expiration = date('Y-m-d H:i:s', strtotime('+1hour'));
            $this->Users->save($user);
            $mailer = new Mailer('default');
            //Envoyer un e-mail avec le lien de réinitialisation du mot de passe
            $mailer
                ->setTo($email)
                ->setSubject('Réinitialisation du mot de pass')
                ->deliver('http://localhost/my_biblio/users/newpassword',[$user]);
            $this->Flash->success('Un email de réinitialisation du mot de passe a été envoyé a votre adresse e-mail.');
            return $this->redirect(['action'=>'login']);
        }
    }

    public function newpassword($token){
        $this->Authorization->SkipAuthorization();
        //vérifier si le token est valide et n'a pa expiré
        $user  = $this->Users->find()
            ->where(['token' => $token])->first();
            if(!$user){
                $this->Flash->error('Ce lien de réinitialisation du mot de passe est invalide ou a expiré.');
                return $this->redirect(['action' => 'login']);
            }
            if($this->request->is('post')){
                //Valider et sauvegarder le nouveau mot de passe
                $newpassword = $this->request->getData('new_password');
                $confirmpassword = $this->request->getData('confirm_password');
                if($newpassword === $confirmpassword){
                   $user->token= null;
                   $user->token_expiration = null;
                   if($this->Users->save($user)){
                    $this->Flash->success('votre mot de passe a été mis a jour avec succès.');
                    return $this->redirect(['action' => 'login']);
                   }else{
                    $this->Flash->error('une erreur s\'est produit lors de la mise a jour de votre mot de passe.Veuillez réessayer.');

            }
            $this->set(compact('user'));
        }
    }

}
}
