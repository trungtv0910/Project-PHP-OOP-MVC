<?php

class CategoriesModel extends Model
{
    private $__table = 'Categories';
    function tableFill(){
        return $this->__table;
    }
    function fieldFill(){
//        return 'name, price';
        return '*';
    }
    function primaryKey()
    {
        return 'id';
    }
}