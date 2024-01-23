<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Authentication\PasswordHasher\DefaultPasswordHasher;
use Authentication\IdentityInterface;

/**
 * User Entity
 *
 * @property int $id
 * @property int $role_id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $status
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property bool|null $deleted
 * @property string|null $token
 * @property int $token_expiration
 * @property string $newpassword
 *
 * @property \App\Model\Entity\Role $role
 * @property \App\Model\Entity\DocumentComment[] $document_comments
 * @property \App\Model\Entity\Document[] $documents
 * @property \App\Model\Entity\ReaderDocument[] $reader_documents
 */
class User extends Entity

{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'role_id' => true,
        'name' => true,
        'email' => true,
        'password' => true,
        'status' => true,
        'created' => true,
        'modified' => true,
        'deleted' => true,
        'token' => true,
        'token_expiration' => true,
        'role' => true,
        'document_comments' => true,
        'documents' => true,
        'reader_documents' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array<string>
     */
    protected $_hidden = [
        'password',
        'token',
    ];
    protected function _setPassword(string $password) : ?string
     { if (strlen($password ) > 0) {
         return (new DefaultPasswordHasher())->hash($password);
         }
         return null;
    }


}
