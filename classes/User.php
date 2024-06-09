<?php


class User extends Db
{
    public function checkAuth($email, $password)
    {
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