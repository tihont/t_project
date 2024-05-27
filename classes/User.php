<?php

/**
 * Class User
 * Класс для работы с пользователями. Модель данных с операциями CRUD над таблицей users.
 */
class User extends Db
{
    // получить информацию о контакте
    public function checkAuth($email, $password)
    {
        // Получить запись из таблицы users с email = $email
        $query = $this->conn->prepare("SELECT * FROM users WHERE email = :email LIMIT 1;");
        $query->bindParam(':email', $email);
        $query->execute();
        $user = $query->fetchAll(PDO::FETCH_ASSOC);

        if (count($user) > 0) {
            $u = $user[0];
            if (password_verify($password, $u['password'])) {
                return $u;
            }
        }
        return false;
    }

}