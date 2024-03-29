<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DocumentCategory Entity
 *
 * @property int $id
 * @property int $document_type_id
 * @property string $name
 * @property string $description
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property bool $deleted
 *
 * @property \App\Model\Entity\DocumentType $document_type
 */
class DocumentCategory extends Entity
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
        'document_type_id' => true,
        'name' => true,
        'description' => true,
        'created' => true,
        'modified' => true,
        'deleted' => true,
        'document_type' => true,
    ];
}
