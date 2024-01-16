<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Document Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $document_categorie_id
 * @property string $title
 * @property string $author
 * @property string $editor
 * @property string $slug
 * @property string $description
 * @property bool $published
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property bool $deleted
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\DocumentCategory $document_category
 * @property \App\Model\Entity\DocumentComment[] $document_comments
 * @property \App\Model\Entity\DocumentTopic[] $document_topics
 * @property \App\Model\Entity\ReaderDocument[] $reader_documents
 */
class Document extends Entity
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
        'user_id' => true,
        'document_categorie_id' => true,
        'title' => true,
        'author' => true,
        'editor' => true,
        'slug' => true,
        'description' => true,
        'published' => true,
        'created' => true,
        'modified' => true,
        'deleted' => true,
        'user' => true,
        'document_category' => true,
        'document_comments' => true,
        'document_topics' => true,
        'reader_documents' => true,
        'cover_photo' => true,
    ];

    protected $_virtual = [
        'cover_photo_url',
    ];

    protected function _getcoverphotoUrl(){
        if($this->cover_photo){
            return '\uploads\covers_photos' . $this->cover_photo->file_path;
        }
        return null;
    }
}
