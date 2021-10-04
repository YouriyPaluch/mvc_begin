<?php


namespace controllers;

use models\Note;
use View;
use Route;
class Index extends AbstractController
{
    public function index()
    {
        $note = new Note();
        $notes = $note->all();
        $view = new View('index_index');
        $view->render(['notes'=>$notes]);
    }
    public function create(){
        $view = new View('index_create');
        $view->render();
    }
    public function store(){
        $noteId = $_REQUEST['id'];
        $noteText = $_REQUEST['note'];
        $note = new Note();
        if($noteId){
            $note->update($noteId, $noteText);
        } else{
            $note->add($noteText);
        }
        Route::redirect();
    }
    public function delete(){
        $noteId = $_REQUEST['id'];
        $note = new Note();
        $note->delete($noteId);
        Route::redirect();
    }
    public function update(){
        $view = new View('index_update');
        $view->render();
    }
}