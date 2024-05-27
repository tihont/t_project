<?php
/**
 * Генерация хеша для пароля. Не является частью проекта. Нужен для добавления пользователя в бд при инициализации базы
 * данных.
 */
$password = 'admin';
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
echo $hashed_password;