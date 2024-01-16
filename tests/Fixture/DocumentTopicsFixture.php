<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DocumentTopicsFixture
 */
class DocumentTopicsFixture extends TestFixture
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
                'document_id' => 1,
                'topic_id' => 1,
            ],
        ];
        parent::init();
    }
}
