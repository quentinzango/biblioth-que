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
                <a href="<?= $this->Path->getBaseUrl() . '/uploads/exemplarydocuments/' . $document->exemplary_document ?>">
                 <img src='<?= $this->Path->getBaseUrl() . 'uploads/coverphotos/' . $document->cover_photo ?>' alt="photo de couverture">
            <?php } else { ?>
                <img src='<?= $this->Path->getBaseUrl() . 'uploads/coverphotos/defaut.jpg' . $document->cover_photo ?>' alt="photo de couverture"></a>
            <?php } ?>
        </div>
    </div>
</div>
