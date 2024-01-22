<?php

/**
 * @var \App\View\AppView $this
 *  @var \App\Model\Entity\Document $document
 */
?>

<div class="row">
    <div class="documents view content">
        <h1><?= h($document->title)  ?></h1>
        <p><?= h($document->description)  ?></p>

        <!--affichageb de la photo de couverture -->
        <?php if (!empty($document->cover_photo)) : ?>
            <img src='<?= $this->Path->getTemplatePath() ?><? ('uploads/coverphotos/' . $document->cover_photo) ?>'alt="photo de couverture">
        <?php endif; ?>
    </div>
</div>
