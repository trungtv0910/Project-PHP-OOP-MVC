<?php

trait QueryBuilder
{

    public $tableName = '';
    public $where = '';
    public $operator = '';
    public $selectField = '*';
    public $limit = '';
    public $orderBy = '';
    public $innerJoin = '';

    public function table($tableName)
    {
        $this->tableName = $tableName;

        return $this;
    }

    public function where($field, $compare, $value)
    {
        if (empty($this->where)) {
            $this->operator = ' WHERE ';
        } else {
            $this->operator = ' AND ';
        }
        $this->where .= "$this->operator $field $compare '$value'";

        return $this; // nếu muốn trỏ đi tiếp thì return this
    }

    public function orWhere($field, $compare, $value)
    {
        if (empty($this->where)) {
            $this->operator = ' WHERE ';
        } else {
            $this->operator = ' OR ';
        }
        $this->where .= "$this->operator $field $compare '$value'";

        return $this; // nếu muốn trỏ đi tiếp thì return this
    }

    public function whereLike($field, $value)
    {
        if (empty($this->where)) {
            $this->operator = ' WHERE ';
        } else {
            $this->operator = ' AND ';
        }
        $this->where .= "$this->operator $field LIKE '$value'";

        return $this; // nếu muốn trỏ đi tiếp thì return this
    }

    public function select($field = '*')
    {
        $this->selectField = $field;
        return $this;

    }

//    limit
    public function limit($number, $offset = 0)
    {
        $this->limit = " LIMIT $offset, $number ";
        return $this;
    }
//order by id DESC
//$this->db->orderBy('id', DESC);
// $this-> db ->orderBy(id ASC, name DESC);
    public function orderBy($field, $type = "ASC")
    {
        $fieldArr = array_filter(explode(',', $field));

        if (!empty($fieldArr) && count($fieldArr) >= 2) {
            // SQL order by multi
            $this->orderBy = "ORDER BY " . implode(', ', $fieldArr);
        } else {
            $this->orderBy = " ORDER BY $field $type ";
        }

        return $this;
    }

    public function get()
    {
        $sqlQuery = "SELECT $this->selectField FROM $this->tableName $this->innerJoin $this->where $this->orderBy $this->limit ";
        $sqlQuery = trim($sqlQuery);
        $query = $this->query($sqlQuery);

        // reset các field sau khi đã get dữ liệu thành công
        $this->resetQuery();

        if (!empty($query)) {
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        return false;

    }

//inner join
    public function join($tableName, $relationship)
    {
        $this->innerJoin .= " INNER JOIN" . $tableName . ' ON ' . $relationship . " ";
        return $this;
    }

    public function first()
    {
        $sqlQuery = "SELECT $this->selectField FROM $this->tableName $this->where $this->orderBy $this->limit ";
        $query = $this->query($sqlQuery);

        // reset các field sau khi đã get dữ liệu thành công
        $this->resetQuery();

        if (!empty($query)) {
            return $query->fetch(PDO::FETCH_ASSOC);
        }
        return false;
    }

    public function resetQuery()
    {
        $this->tableName = '';
        $this->where = '';
        $this->operator = '';
        $this->selectField = '*';
        $this->limit = '';
        $this->orderBy = '';
        $this->innerJoin = '';
    }

//insert
    public function insert($data)
    {
        $tableName = $this->tableName;
        $insertStatus = $this->insertData($tableName, $data);
        return $insertStatus;

    }

    //last id
    public function lastId()
    {
        return $this->lastInsertId();
    }

//update
    public function update($data)
    {
        $whereUpdate = str_replace('WHERE', '', $this->where);
        $whereUpdate = trim($whereUpdate);
        $tableName = $this->tableName;

        $updateStatus = $this->updateData($tableName, $data, $whereUpdate);

        return $updateStatus;
    }

    public function delete()
    {
        $whereDelete = str_replace('WHERE', '', $this->where);
        $whereDelete = trim($whereDelete);
        $tableName = $this->tableName;
        $deleteStatus = $this->deleteData($tableName, $whereDelete);
        return $deleteStatus;
    }


}