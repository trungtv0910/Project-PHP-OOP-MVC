<?php

class Request
{
    /*
     * 1. method
     * 2. Body
     */
    private $__rules = [], $__messages = [], $__errors = [];
    public $db;

    public function __construct()
    {
        $this->db = new Database();

    }

    public function getMethod()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

//    phương thức isPost
    public function isPost()
    {
        if ($this->getMethod() == 'post') {
            return true;
        }
        return false;
    }

    //    phương thức isPost
    public function isGet()
    {
        if ($this->getMethod() == 'get') {
            return true;
        }
        return false;
    }

    public function getFields()
    {
        $dataFields = [];
        if ($this->isGet()) {
            //xử lý lấy dữ liệu với phương thức là get
            if (!empty($_GET)) {
                foreach ($_GET as $key => $value) {
//                $dataFields[$key]= $value;
                    if (is_array($value)) {
                        $dataFields[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
                    } else {
                        $dataFields[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
                    }
                }
            }
        } else if ($this->isPost()) {
            if (!empty($_POST)) {
                foreach ($_POST as $key => $value) {
                    if (is_array($value)) {
                        $dataFields[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
                    } else {
                        $dataFields[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
                    }
                }

            }

        }
        return $dataFields;
    }

    //set rules
    public function rules($rules = [])
    {
        $this->__rules = $rules;

    }

    //set message
    public function message($message)
    {
        $this->__messages = $message;

    }

    public function validate()
    {

//        echo '<pre>';
//        print_r($this->__messages);
//        echo '</pre>';
//        thực hiện đọc rules
        $this->__rules = array_filter($this->__rules);
        $checkValidate = true;

        if (!empty($this->__rules)) {
            $dataFields = $this->getFields(); // lấy data trường nhập vào để so khớp với điều kiện validate

            foreach ($this->__rules as $fieldName => $ruleItem) {
                $ruleItemArr = explode('|', $ruleItem);
//               array ([0]=>required,[1]=>min:5,[2]=>max:30)

                $ruleName = null;
                $ruleValue = null;
                foreach ($ruleItemArr as $rules) {

                    // nó in ra item tuy nhiên có trường hợp có dấu ":" và có trường hợp không có dấu ":" thì xử lý ntn
                    $ruleArr = explode(':', $rules);
                    $ruleName = reset($ruleArr); // lấy được cái tên đầu tiên của giá trị ví dụ: min max required

                    if (count($ruleArr) > 1) { // lấy giá trị của yêu cầu vidu min :1 max:30 giá trị là 1 và 30
                        $ruleValue = end($ruleArr);

                    }


                    // sau khi đã có rule và value của nó thì tiến hành check
                    if ($ruleName == 'required') {
                        if (empty(trim($dataFields[$fieldName]))) {
                            $this->setErrors($fieldName, $ruleName);
                            $checkValidate = false;
                        }
                    }
                    if ($ruleName == 'min') {
                        if (strlen(trim($dataFields[$fieldName])) < $ruleValue) {
                            $this->setErrors($fieldName, $ruleName);
                            $checkValidate = false;
                        }
                    }
                    if ($ruleName == 'max') {
                        if (strlen(trim($dataFields[$fieldName])) > $ruleValue) {
                            $this->setErrors($fieldName, $ruleName);
                            $checkValidate = false;
                        }
                    }
                    if ($ruleName == 'email') {
                        if (!filter_var($dataFields[$fieldName], FILTER_VALIDATE_EMAIL)) {
                            $this->setErrors($fieldName, $ruleName);
                            $checkValidate = false;
                        }
                    }
                    if ($ruleName == 'match') {
                        if (trim($dataFields[$fieldName]) != trim($dataFields[$ruleValue])) {
                            $this->setErrors($fieldName, $ruleName);
                            $checkValidate = false;
                        }
                    }
                    if ($ruleName == 'unique') {
                        $tableName = null;
                        $fieldCheck = null;
                        if (!empty($ruleArr[1])) {
                            $tableName = $ruleArr[1];
                        }
                        if (!empty($ruleArr[2])) {
                            $fieldCheck = $ruleArr[2];
                        }
                        if (!empty($tableName) && !empty($fieldCheck)) {

                            if(count($ruleArr)==3){
                                $checkExist = $this->db->query("SELECT $fieldCheck FROM $tableName WHERE  $fieldCheck='$dataFields[$fieldName]'")->rowCount();

                            }else if(count($ruleArr)==4){
                                if(!empty($ruleArr[3]) && preg_match('~.+?\=.+?~is',$ruleArr[3])){
                                    $conditionWhere  =$ruleArr[3];
                                    $conditionWhere  = str_replace('=','<>',$conditionWhere);
                                    $checkExist = $this->db->query("SELECT $fieldCheck FROM $tableName WHERE  $fieldCheck='$dataFields[$fieldName]' AND $conditionWhere")->rowCount();
//                                    var_dump($checkExist);
                                }

                            }
                            if (!empty($checkExist)) {
                                $this->setErrors($fieldName, $ruleName);
                                $checkValidate = false;
                            }
                        }
                    }
// callback validate
                    if(preg_match('~^callback_(.+)~is',$ruleName,$callbackArr)){
                        if(!empty($callbackArr[1])){
                            $callbackName= $callbackArr[1];
                           $controller = App::$app->getCurrentController();
                           if(method_exists($controller,$callbackName)){
                               $checkCallback = call_user_func_array([$controller,$callbackName],[trim($dataFields[$fieldName])]);
                               if(!$checkCallback){
                                   $this->setErrors($fieldName, $ruleName);
                                   $checkValidate = false;
                               }
                           }

                        }
                    }
                }
            }
        }

        $sessionKey= Session::isInvalid();
        Session::flash($sessionKey.'_errors',$this->errors());
        Session::flash($sessionKey.'_old',$this->getFields());

        return $checkValidate;

    }

    // get errors
    public function errors($fieldName = '')
    {
        if (!empty($this->__errors)) {
            if (empty($fieldName)) {
//                return $this->errors; // trường hợp không cần nhập gì thì nó in ra cả 1 mảng lỗi
                $errorsArr = [];
                foreach ($this->__errors as $key => $error) {
                    $errorsArr[$key] = reset($error);
                }
                return $errorsArr;
            }
            return reset($this->__errors[$fieldName]);// sử dụng reset để nó trả về 1 lỗi đầu tiên khi được gọi chứ không trả về cả mảng lỗi
        }
        return false;
    }

//set errors
    public function setErrors($fieldName, $ruleName)
    {
        $this->__errors[$fieldName][$ruleName] = $this->__messages[$fieldName . '.' . $ruleName];
    }

}