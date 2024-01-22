<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ReaderDocumentsFixture
 */
class ReaderDocumentsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'user_id' => 1,
                'document_id' => 1,
                'nomber_download' => 1,
                'created' => '2024-01-22 12:17:16',
                'modified' => '2024-01-22 12:17:16',
            ],
        ];
        parent::init();
    }
}
