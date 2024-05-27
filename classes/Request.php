<?php

/**
 * Class Request
 * Класс для работы с запросами посетителей. Модель данных с операциями CRUD над таблицей requests.
 */
class Request extends Db
{
    // Добавить запрос посетителя в базу данных (перед отправкой уведомления на почту)
    public function addRequest($name, $email, $request)
    {
        $query = $this->conn->prepare("INSERT INTO requests (name, email, request) VALUES (:name, :email, :request);");
        $query->bindParam(':name', $name);
        $query->bindParam(':email', $email);
        $query->bindParam(':request', $request);
        return $query->execute();
    }

    // Получить все запросы (функция администратора)
    public function getRequests()
    {
        $query = $this->conn->query("SELECT * FROM requests;");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    // Удалить запрос по идентификатору (функция администратора)
    public function deleteRequest($id)
    {
        $query = $this->conn->prepare("DELETE FROM requests WHERE id = :id;");
        $query->bindParam(':id', $id);
        return $query->execute();
    }

    // Получить запрос по идентификатору (функция администратора)
    public function getRequest($id)
    {
        $query = $this->conn->prepare("SELECT * FROM requests WHERE id = :id;");
        $query->bindParam(':id', $id);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    // Обновить запрос по идентификатору (функция администратора)
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