<?php
declare(strict_types=1);

namespace App\Test\TestCase\View\Helper;

use App\View\Helper\TitleHelper;
use Cake\TestSuite\TestCase;
use Cake\View\View;

/**
 * App\View\Helper\TitleHelper Test Case
 */
class TitleHelperTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\View\Helper\TitleHelper
     */
    protected $Title;

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $view = new View();
        $this->Title = new TitleHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Title);

        parent::tearDown();
    }
}
