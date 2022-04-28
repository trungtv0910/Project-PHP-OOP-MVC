<?php
/*
Kế thừa từ class Model

*/
class HomeModel extends Model {
/*
 * Chú ý nếu model mà khởi tạo __construct ở đây thì lớp con này phải gọi đến construct của lớp cha ra
 *
 */
    public function __construct()
    {
        parent::__construct();
    }
// không nền khởi tạo 1 cóntruct trong lớp này

    private $__table = 'test';
    function tableFill(){
      return 'test';
    }
    function fieldFill(){
//        return 'name, price';
        return '*';
    }
    function primaryKey()
    {
        return 'id';
    }

    public function getList(){
        $data =$this->db->query("SELECT * FROM $this->__table")->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function getDetail($id){
        $data = [
            'Item1',
            'Item2',
            'Item3',

        ];
        return $data[$id];
    }

    public function getListProvice(){
//      $data=  $this->db->table('test')->where('price','<=',90000)->orWhere('quantity','>',20)->select('price, name')->get();
// test where like             $data=  $this->db->table('test')->whereLike('name','%thi%')->select('price, name')->get();
//        $data=  $this->db->table('test')->select('price, name')->limit(1,0)->get();
//test order by
//        $data=  $this->db->table('test')->limit(2)->orderBy('price',"ASC",)->get();
// inner join
//        $data=  $this->db->table('test')->join('category','product.cate_id = categories.id')->get();

        $dataInsert=[
            'name'=>'Nguyễn Văn A',
            'quantity'=>20,
            'price'=>15000
        ];
//        insert data
//        $data=  $this->db->table('test')->insert($dataInsert);

        $dataUpdate=[
            'name'=>'Nguyễn Văn B',
            'quantity'=>222,
            'price'=>11111
        ];
//        update
        $data = $this->db->table('test')->where('id','=','3')->update($dataUpdate);


        return $data;
//        $this->db->table('test')->select()->get();
    }
//insert dataa
public function insertUsers($data){
     $this->db->table('test')->insert($data);
    return $this->db->lastId();
}

    public function updateUser($data,$id){
//        thực tế funtion bị thiếu id
        return $this->db->table('test')->where('id','=',$id)->update($data);

    }
    public function deleteUser($id){
        return $this->db->table('test')->where('id','=',$id)->delete();
    }
    public function getDetailProvice($id){
//        $data = $this->db->table('test')->where('id','=',$id)->first();
        $data = $this->db->table('test')->where('id','=',$id)->first();


        return $data;
    }
}