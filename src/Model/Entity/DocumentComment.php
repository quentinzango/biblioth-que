<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DocumentComment Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $document_id
 * @property string|null $comment
 * @property \Cake\I18n\FrozenTime|null $created
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Document $document
 */
class DocumentComment extends Entity
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
        'document_id' => true,
        'comment' => true,
        'created' => true,
        'user' => true,
        'document' => true,
    ];
}
