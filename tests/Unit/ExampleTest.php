<?php

namespace Tests\Unit;

use App\Http\Controllers\ItemController;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testIsValidNominal()
    {
        $data = ['name'=>'','content'=>random_bytes(1001)];
        $this->assertFalse(ItemController::is_Valid($data));
    }
    public function testIsValidNameExist()
    {
        $data = ['name'=>'az','content'=>'aaaaaaaa'];
        $this->assertFalse(ItemController::is_Valid($data));
    }
}
