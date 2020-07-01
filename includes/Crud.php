<?php


include_once 'AbstractCrud.php';


class Crud extends AbstractCrud
{


    public function __construct()
    {
        parent::__construct();
    }

    public function create($table, $data)
    {
        $dataKeys = array_keys($data);
        $dataValues = array_values($data);
        try {
            $sql = "INSERT INTO " . $table . " (" . join(', ', $dataKeys) . " ) VALUES ('" . join('\', \' ', $dataValues) . " ')";

            $query = $this->db->getConn()->prepare($sql);
            if ($query->execute()) {
                $id = $this->db->getConn()->lastInsertId();
            }
            return $id;

        } catch (PDOException $e) {
            array_push($errors, $e->getMessage());
        }
    }

    public function read($fields, $table, $where)
    {
        $sql = "SELECT " . $fields . " FROM " . $table . " WHERE " . $where;

        $result = $this->db->getConn()->prepare($sql);
        $result->execute();

        $data = $result->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }


    public function update($table, $data, $where)
    {
        $dataKeys = array_keys($data);
        $dataValues = array_values($data);

        $sql = "UPDATE " . $table . " (" . join(', ', $dataKeys) . " ) SET ('" . join('\', \' ', $dataValues) . " ') WHERE " . $where;
        $result = $this->db->getConn()->prepare($sql);
        if ($result->execute()) {
            return true;
        }
    }

    public function delete($table, $id)
    {
        $sql = "DELETE FROM " . $table . " WHERE id= " . $id;
        $result = $this->db->getConn()->prepare($sql);
        $result->execute();

        return true;
    }
}