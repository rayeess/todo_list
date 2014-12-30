<?php
class TodoController extends BaseController
{
  public $restful = true;
  public function postAdd() {
    $todo = new Todo();
    $todo->title = Input::get("title");
    $todo->save();      
    $last_todo = $todo->id;
    $todos = Todo::whereId($last_todo)->get();
    return View::make("ajaxData")->with("todos", $todos);
  }
  public function postUpdate($id) {        
    $task = Todo::find($id);
    $task->title = Input::get("title");
    $task->save();
    return "OK";        
  }
}