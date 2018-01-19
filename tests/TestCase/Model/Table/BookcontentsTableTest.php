<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BookcontentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BookcontentsTable Test Case
 */
class BookcontentsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BookcontentsTable
     */
    public $Bookcontents;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.bookcontents'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Bookcontents') ? [] : ['className' => BookcontentsTable::class];
        $this->Bookcontents = TableRegistry::get('Bookcontents', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Bookcontents);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
