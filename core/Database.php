<?php

class Database
{
    use QueryBuilder;
    private $__conn;

    //kết nói thông qua connection , khi kết nối rồi thì nó không kết nối nữa
    public function __construct()
    {
        global $db_config;
        $this->__conn = Connection::getInstance($db_config); // vì connetion được private (bảo mật) thay vì public nên sẽ đc gọi theo cách này và được gọi qua trung gia là get Intanse
    }


    function insertData($table, $data)
    {
        if (!empty($data)) {
            $fieldStr = '';
            $valueStr = '';
            foreach ($data as $key => $value) {
                $fieldStr .= $key . ',';
                $valueStr .= "'" . $value . "',";
            }
            $fieldStr = rtrim($fieldStr, ',');
            $valueStr = rtrim($valueStr, ',');
            $sql = "INSERT INTO $table($fieldStr) VALUES ($valueStr)";
            $status = $this->query($sql);
            if ($status) {
                return true;
            }
        }
        return false;
    }

    function updateData($table, $data, $condition = '')
    {
        if (!empty($data)) {
            $updateStr = '';

            foreach ($data as $key => $value) {
                $updateStr .= "$key ='$value',";
            }
            $updateStr = rtrim($updateStr, ',');
            if (!empty($condition)) {
                $sql = "UPDATE $table SET $updateStr WHERE $condition";
            } else {
                $sql = "UPDATE $table SET $updateStr";
            }
            $status = $this->query($sql);
            if ($status) {
                return true;
            }
        }
        return false;
    }

    function deleteData($table, $condition = '')
    {
        if (!empty($condition)) {
            $sql = "DELETE FROM $table WHERE $condition ";
        } else {
            $sql = "DELETE FROM  $table ";
        }

        $status = $this->query($sql);
        if ($status) {
            return true;
        }
    }


    public function query($sql)
    {
        try {
            $statement = $this->__conn->prepare($sql);
            $statement->execute();
            return $statement;
        } catch (Exception $exception) {
            $mess = $exception->getMessage();
            $data['message']=$mess;
            App::$app->loadError('database',$data);
            die();
        }

    }
// trả về id mới nhất sau khi đã insert
    function lastInsertId()
    {
        return $this->__conn->lastInsertId();

    }

}