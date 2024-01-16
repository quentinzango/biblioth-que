<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TopicsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TopicsTable Test Case
 */
class TopicsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TopicsTable
     */
    protected $Topics;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Topics',
        'app.DocumentTopics',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Topics') ? [] : ['className' => TopicsTable::class];
        $this->Topics = $this->getTableLocator()->get('Topics', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Topics);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TopicsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
