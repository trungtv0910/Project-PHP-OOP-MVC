<?php

// cái này là base model và kế thừa từ các model --- BASE MODEL
abstract class Model extends Database
{

    protected $db;

    public function __construct()
    {
        $this->db = new Database();
    //khởi tạo biến db và db này có thể kế thừa từ những model con
    }
    abstract function tableFill();
    abstract function fieldFill();
    abstract function primaryKey();



/*2 cái get và first ở model thì dùng khi nào trong khi có ở lớp trait QueryBuild ??
*   dùng trong trường hợp home model  không viết query builder và sử dụng 2 phương thức là tableFill và fieldFill và nó gét truc tiếp với dâtábase
 *
 * sử dụng ở Home Controller   $dataGetModel= $this->province->get();
 * Để tránh nhầm lẫn giữa 2 phương thức get của model và get của lớp trait thì đổi tên get của model thành all() và find($id)
*/


    //lấy tất cả bản ghi
    public function all(){
        $tableName =$this->tableFill();
        $fieldSelect =$this->fieldFill();
        if(empty($fieldSelect)){
            $fieldSelect ='*';
        }
        $sql = "SELECT $fieldSelect FROM $tableName";
        $query = $this->db->query($sql);
        if(!empty($query)){
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        return  false;
    }
    public function find($id){
        $tableName =$this->tableFill();
        $fieldSelect =$this->fieldFill();
        $primaryKey =$this->primaryKey();
        if(empty($fieldSelect)){ // nếu người dùng quên hoặc không điền trường fieldselect thì mặc định nó là *
            $fieldSelect ='*';
        }
//        chú ý không phải lúc nào cái trường id cũng là id với các bảng khác nhau nên phải tạo ra phương thức abstract
        $sql = "SELECT $fieldSelect FROM $tableName WHERE  $primaryKey = $id";

        $query = $this->db->query($sql);
        if(!empty($query)){
            return $query->fetch(PDO::FETCH_ASSOC); // không dùng all mầ chỉ dùng fetch  thôi
        }
        return  false;
    }

}