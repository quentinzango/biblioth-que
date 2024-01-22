<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Document $document
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Document'), ['action' => 'edit', $document->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Document'), ['action' => 'delete', $document->id], ['confirm' => __('Are you sure you want to delete # {0}?', $document->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Documents'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Document'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="documents view content">
            <h3><?= h($document->title) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $document->has('user') ? $this->Html->link($document->user->name, ['controller' => 'Users', 'action' => 'view', $document->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Document Category') ?></th>
                    <td><?= $document->has('document_category') ? $this->Html->link($document->document_category->name, ['controller' => 'DocumentCategories', 'action' => 'view', $document->document_category->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($document->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Author') ?></th>
                    <td><?= h($document->author) ?></td>
                </tr>
                <tr>
                    <th><?= __('Editor') ?></th>
                    <td><?= h($document->editor) ?></td>
                </tr>
                <tr>
                    <th><?= __('cover_photo') ?></th>
                    <td><?= h($document->cover_photo) ?></td>
                </tr>
                <tr>
                    <th><?= __('exemplary_document') ?></th>
                    <td><?= h($document->exemplary_document) ?></td>
                </tr>
                <tr>
                    <th><?= __('Slug') ?></th>
                    <td><?= h($document->slug) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($document->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($document->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($document->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Published') ?></th>
                    <td><?= $document->published ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Deleted') ?></th>
                    <td><?= $document->deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($document->description)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Document Comments') ?></h4>
                <?php if (!empty($document->document_comments)) : ?>
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
                        <?php foreach ($document->document_comments as $documentComments) : ?>
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
                <h4><?= __('Related Document Topics') ?></h4>
                <?php if (!empty($document->document_topics)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Document Id') ?></th>
                            <th><?= __('Topic Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($document->document_topics as $documentTopics) : ?>
                        <tr>
                            <td><?= h($documentTopics->id) ?></td>
                            <td><?= h($documentTopics->document_id) ?></td>
                            <td><?= h($documentTopics->topic_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'DocumentTopics', 'action' => 'view', $documentTopics->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'DocumentTopics', 'action' => 'edit', $documentTopics->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'DocumentTopics', 'action' => 'delete', $documentTopics->id], ['confirm' => __('Are you sure you want to delete # {0}?', $documentTopics->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Reader Documents') ?></h4>
                <?php if (!empty($document->reader_documents)) : ?>
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
                        <?php foreach ($document->reader_documents as $readerDocuments) : ?>
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
