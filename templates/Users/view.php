<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="users view content">
            <h3><?= h($user->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Role') ?></th>
                    <td><?= $user->has('role') ? $this->Html->link($user->role->name, ['controller' => 'Roles', 'action' => 'view', $user->role->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($user->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($user->email) ?></td>
                </tr>

                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= h($user->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($user->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Token Expiration') ?></th>
                    <td><?=h($user->token_expiration) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($user->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($user->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Deleted') ?></th>
                    <td><?= $user->deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Document Comments') ?></h4>
                <?php if (!empty($user->document_comments)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Document Id') ?></th>
                            <th><?= __('Comment') ?></th>
                            <th><?= __('Created') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->document_comments as $documentComments) : ?>
                        <tr>
                            <td><?= h($documentComments->id) ?></td>
                            <td><?= h($documentComments->user_id) ?></td>
                            <td><?= h($documentComments->document_id) ?></td>
                            <td><?= h($documentComments->comment) ?></td>
                            <td><?= h($documentComments->created) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'DocumentComments', 'action' => 'view', $documentComments->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'DocumentComments', 'action' => 'edit', $documentComments->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'DocumentComments', 'action' => 'delete', $documentComments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $documentComments->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Documents') ?></h4>
                <?php if (!empty($user->documents)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Document Categorie Id') ?></th>
                            <th><?= __('Title') ?></th>
                            <th><?= __('Author') ?></th>
                            <th><?= __('Editor') ?></th>
                            <th><?= __('Slug') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Published') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Deleted') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->documents as $documents) : ?>
                        <tr>
                            <td><?= h($documents->id) ?></td>
                            <td><?= h($documents->user_id) ?></td>
                            <td><?= h($documents->document_categorie_id) ?></td>
                            <td><?= h($documents->title) ?></td>
                            <td><?= h($documents->author) ?></td>
                            <td><?= h($documents->editor) ?></td>
                            <td><?= h($documents->slug) ?></td>
                            <td><?= h($documents->description) ?></td>
                            <td><?= h($documents->published) ?></td>
                            <td><?= h($documents->created) ?></td>
                            <td><?= h($documents->modified) ?></td>
                            <td><?= h($documents->deleted) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Documents', 'action' => 'view', $documents->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Documents', 'action' => 'edit', $documents->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Documents', 'action' => 'delete', $documents->id], ['confirm' => __('Are you sure you want to delete # {0}?', $documents->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Reader Documents') ?></h4>
                <?php if (!empty($user->reader_documents)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Document Id') ?></th>
                            <th><?= __('Nomber Download') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->reader_documents as $readerDocuments) : ?>
                        <tr>
                            <td><?= h($readerDocuments->id) ?></td>
                            <td><?= h($readerDocuments->user_id) ?></td>
                            <td><?= h($readerDocuments->document_id) ?></td>
                            <td><?= h($readerDocuments->nomber_download) ?></td>
                            <td><?= h($readerDocuments->created) ?></td>
                            <td><?= h($readerDocuments->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'ReaderDocuments', 'action' => 'view', $readerDocuments->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'ReaderDocuments', 'action' => 'edit', $readerDocuments->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'ReaderDocuments', 'action' => 'delete', $readerDocuments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $readerDocuments->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
