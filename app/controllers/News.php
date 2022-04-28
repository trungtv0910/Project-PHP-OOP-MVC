<?php
class News extends Controller {
    public $data = [];
    public function category($id){
        echo 'Tin Tức- '.$id;
    }
    public function index(){
        $this->render('news/list',$this->data);
    }
}