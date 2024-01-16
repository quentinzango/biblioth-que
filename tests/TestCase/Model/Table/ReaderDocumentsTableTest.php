<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ReaderDocumentsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ReaderDocumentsTable Test Case
 */
class ReaderDocumentsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ReaderDocumentsTable
     */
    protected $ReaderDocuments;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.ReaderDocuments',
        'app.Users',
        'app.Documents',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ReaderDocuments') ? [] : ['className' => ReaderDocumentsTable::class];
        $this->ReaderDocuments = $this->getTableLocator()->get('ReaderDocuments', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->ReaderDocuments);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ReaderDocumentsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ReaderDocumentsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
