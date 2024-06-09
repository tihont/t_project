<?php


class Request extends Db
{
    public function addRequest($name, $email, $request)
    {
        $query = $this->conn->prepare("INSERT INTO requests (name, email, request) VALUES (:name, :email, :request);");
        $query->bindParam(':name', $name);
        $query->bindParam(':email', $email);
        $query->bindParam(':request', $request);
        if ($query->execute()) {
            return $this->conn->lastInsertId();
        }
        return false;
    }

    public function getRequests()
    {
        $query = $this->conn->query("SELECT * FROM requests;");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteRequest($id)
    {
        $query = $this->conn->prepare("DELETE FROM requests WHERE id = :id;");
        $query->bindParam(':id', $id);
        return $query->execute();
    }

    public function getRequest($id)
    {
        $query = $this->conn->prepare("SELECT * FROM requests WHERE id = :id;");
        $query->bindParam(':id', $id);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function updateRequest($id, $name, $email, $phone, $request)
    {
        $query = $this->conn->prepare("UPDATE requests SET name = :name, email = :email, request = :request WHERE id = :id;");
        $query->bindParam(':id', $id);
        $query->bindParam(':name', $name);
        $query->bindParam(':email', $email);
        $query->bindParam(':request', $request);
        return $query->execute();
    }

}