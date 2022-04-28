<?php
class ProductModel extends Model{
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
    public function getProductList(){
        return [
            'sản phẩm 1'=> 1,
            'sản phẩm 2'=> 2,
            'sản phẩm 3'=> 3,
        ];
    }
    public function getProductDetail($id){
        $data =[
            'sản phẩm 1',
            'sản phẩm 2',
            'sản phẩm 3',
        ];
        return $data[$id];
    }
}