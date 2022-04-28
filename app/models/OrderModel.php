<?php

class OrderModel extends Model
{
    private $__table = 'products';
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