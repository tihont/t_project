<?php

class Specification extends Db
{

//    получить группы спецификаций
    public function getGroups()
    {
        $query = $this->conn->query("SELECT * FROM specifications;");
        $groups = $query->fetchAll(PDO::FETCH_ASSOC);
        return $groups;
    }

//    получить группу спецификаций по идентификатору
    public function getGroup($id)
    {
        $query = $this->conn->query("SELECT * FROM specifications WHERE id = :id LIMIT 1;");
        $query->bindParam(':id', $id);

        $group = $query->execute();
//        $group = $query->fetchAll(PDO::FETCH_ASSOC);
        return $group;
    }

    //    добавить группу спецификаций
    public function addGroup($group_name, $description)
    {
        $query = $this->conn->prepare("INSERT INTO specifications (group_name, description) VALUES (:group_name, :description);");
        $query->bindParam(':group_name', $group_name);
        $query->bindParam(':description', $description);
        $query->execute();
    }

    //    обновить группу спецификаций
    public function updateGroup($id, $group_name, $description)
    {
        $query = $this->conn->prepare("UPDATE specifications SET group_name = :group_name, description = :description WHERE id = :id;");
        $query->bindParam(':id', $id);
        $query->bindParam(':group_name', $group_name);
        $query->bindParam(':description', $description);
        $query->execute();
    }

    //    удалить группу спецификаций
    public function deleteGroup($id)
    {
        $query = $this->conn->prepare("DELETE FROM specifications WHERE id = :id;");
        $query->bindParam(':id', $id);
        $query->execute();
    }

}