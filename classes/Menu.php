<?php

/**
 * Class Menu
 * Класс для хранения меню сайта в виде структуры данных с базовыми методами. Необходим для создания нескольких меню: для обычных пользователей и для админа
 */
class Menu
{
    // массив, содержащий главное меню сайта
    private array $menu;

    function __construct(array $menu)
    {
        $this->menu = $menu;
    }

    // получение меню, хранящегося в соответствующем экземпляре данного класса
    function get_menu()
    {
        return $this->menu;
    }

    // проверка наличия псевдонима страницы в меню
    function check_page($page)
    {
        return array_key_exists($page, $this->menu);
    }
}