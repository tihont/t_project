<?php


class Contact extends Db
{
    public function getContact($id = 1)
    {
        $query = $this->conn->query("SELECT * FROM contacts WHERE id = " . $id . " LIMIT 1;");
        $contact = $query->fetchAll(PDO::FETCH_ASSOC);
        return $contact;
    }

    public function getContacts()
    {
        $query = $this->conn->query("SELECT * FROM contacts;");
        $contacts = $query->fetchAll(PDO::FETCH_ASSOC);
        return $contacts;
    }


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

    public function addContact($company_name, $address, $phone, $email)
    {
        $query = $this->conn->prepare("INSERT INTO contacts (company_name, address, phone, email) VALUES (:company_name, :address, :phone, :email);");
        $query->bindParam(':company_name', $company_name);
        $query->bindParam(':address', $address);
        $query->bindParam(':phone', $phone);
        $query->bindParam(':email', $email);
        return $query->execute();
    }

    public function deleteContact($id)
    {
        $query = $this->conn->prepare("DELETE FROM contacts WHERE id = :id;");
        $query->bindParam(':id', $id);
        return $query->execute();
    }
}