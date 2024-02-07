<?php

/**
 * @var \App\View\AppView $this
 *  @var \App\Model\Entity\Document $document
 */
?>

<div class="row row-pb-md">
    <div class="col-lg-3 mb-4 text-center">
        <div class="documents view content">
            <h1><?= h($document->title)  ?></h1>
            <p><?= h($document->description)  ?></p>

            <!--affichageb de la photo de couverture -->
            <?php if (!empty($document->cover_photo) && !empty($document->exemplary_document)) { ?>
                <a href="<?= $this->Path->getBaseUrl() . '/uploads/exemplarydocuments/' . $document->exemplary_document ?>"
                target="_blank" download>
                 <img src='<?= $this->Path->getBaseUrl() . 'uploads/coverphotos/' . $document->cover_photo ?>' download  alt="photo de couverture">
                 <i class="fa fa-download" aria-hidden="true"></i>

                 </a>
            <?php } ?>
        </div>
    </div>
</div>
