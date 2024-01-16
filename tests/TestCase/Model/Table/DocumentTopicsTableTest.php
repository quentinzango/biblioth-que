<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DocumentTopicsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DocumentTopicsTable Test Case
 */
class DocumentTopicsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DocumentTopicsTable
     */
    protected $DocumentTopics;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.DocumentTopics',
        'app.Documents',
        'app.Topics',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('DocumentTopics') ? [] : ['className' => DocumentTopicsTable::class];
        $this->DocumentTopics = $this->getTableLocator()->get('DocumentTopics', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->DocumentTopics);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\DocumentTopicsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\DocumentTopicsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
