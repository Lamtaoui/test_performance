<?php

namespace Tests\Unit;

use App\Http\Controllers\ItemController;
use App\Http\Controllers\TodolistController;
use Tests\TestCase;
use App\Item;
use App\Todolist;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public TodoList $todolist;

    public function __construct()
    {
        $todolist=new Todolist('test','1');
    }
    public function todoIsValidExist()
    {
        $this->assertTrue(TodolistController::is_Valid());
    }
    public function itemIsValidContent()
    {
        $data = ['name'=>'az','content'=>random_bytes(1001)];
        $this->assertFalse(ItemController::is_Valid($data));
    }
    public function itemIsValidNameExist()
    {
        $data = ['name'=>'az','content'=>'aaaaaaaa'];
        $this->assertFalse(ItemController::is_Valid($data));
    }
}
