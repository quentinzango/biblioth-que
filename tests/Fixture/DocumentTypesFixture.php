<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DocumentTypesFixture
 */
class DocumentTypesFixture extends TestFixture
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
                'name' => 'Lorem ipsum dolor sit amet',
                'created' => '2024-01-06 17:45:44',
                'modified' => '2024-01-06 17:45:44',
                'deleted' => 1,
            ],
        ];
        parent::init();
    }
}
