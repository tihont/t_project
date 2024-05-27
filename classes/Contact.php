<?php

/**
 * Class Contact
 * Класс для работы с контактами. Модель данных с операциями CRUD над таблицей contacts.
 */
class Contact extends Db
{
    // получить информацию о контакте по id
    public function getContact($id = 1)
    {
        // Получить запись из таблицы contacts с id = $id
        $query = $this->conn->query("SELECT * FROM contacts WHERE id = " . $id . " LIMIT 1;");
        $contact = $query->fetchAll(PDO::FETCH_ASSOC);
        return $contact;
    }

    // получить все контакты
    public function getContacts()
    {
        $query = $this->conn->query("SELECT * FROM contacts;");
        $contacts = $query->fetchAll(PDO::FETCH_ASSOC);
        return $contacts;
    }


    // обновить информацию о контакте
    public function updateContact($id, $company_name, $address, $phone, $email)
    {
        $query = $this->conn->prepare("UPDATE contacts SET company_name = :company_name, address = :address, phone = :phone, email = :email WHERE id = :id;");
        $query->bindParam(':id', $id);
        $query->bindParam(':company_name', $company_name);
        $query->bindParam(':address', $address);
        $query->bindParam(':phone', $phone);
        $query->bindParam(':email', $email);
        return $query->execute();
    }

    // добавить информацию о контакте
    public function addContact($company_name, $address, $phone, $email)
    {
        $query = $this->conn->prepare("INSERT INTO contacts (company_name, address, phone, email) VALUES (:company_name, :address, :phone, :email);");
        $query->bindParam(':company_name', $company_name);
        $query->bindParam(':address', $address);
        $query->bindParam(':phone', $phone);
        $query->bindParam(':email', $email);
        return $query->execute();
    }

    // удалить информацию о контакте
    public function deleteContact($id)
    {
        $query = $this->conn->prepare("DELETE FROM contacts WHERE id = :id;");
        $query->bindParam(':id', $id);
        return $query->execute();
    }
}