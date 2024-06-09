<?php


class Menu
{
    private array $menu;

    function __construct(array $menu)
    {
        $this->menu = $menu;
    }

    function get_menu()
    {
        return $this->menu;
    }

    function check_page($page)
    {
        return array_key_exists($page, $this->menu);
    }
}