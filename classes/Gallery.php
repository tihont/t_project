<?php

/**
 * Сlass Gallery
 * Класс для работы с элементами галереи. Модель данных с операциями CRUD над таблицей gallery.
 */
class Gallery extends Db
{
    // количество элементов галереи на странице (значение берется из глобальной константы, определенной в файле config.php)
    private $limit = __IMAGES_PER_PAGE__;

    //   получение всех элементов галереи с пагинацией (по 12 элементов на страницу) для страницы gallery.php
    public function getItems($page = 1)
    {
        $offset = ($page - 1) * $this->limit;
        $query = $this->conn->query("SELECT * FROM gallery LIMIT $this->limit OFFSET $offset");
        $gallery = $query->fetchAll(PDO::FETCH_ASSOC);
        return $gallery;
    }

    // получение всех элементов галереи, которые должны отображаться в слайдере на главной странице
    public function getSliderItems()
    {
        $query = $this->conn->query("SELECT * FROM gallery WHERE is_slider = 1");
        $gallery = $query->fetchAll(PDO::FETCH_ASSOC);
        return $gallery;
    }

    // получение всех элементов галереи (для админки)
    public function getAllItems()
    {
        $query = $this->conn->query("SELECT * FROM gallery");
        $gallery = $query->fetchAll(PDO::FETCH_ASSOC);
        return $gallery;
    }

    // получение элемента галереи по идентификатору (для админки)
    public function getItem($id)
    {
        $query = $this->conn->query("SELECT * FROM gallery WHERE id = $id LIMIT 1");
        $gallery = $query->fetchAll(PDO::FETCH_ASSOC);
        return $gallery;
    }

    // добавление элемента галереи (для админки)
    public function addItem($title, $short_desc, $description, $image, $is_slider)
    {
        $query = $this->conn->prepare("INSERT INTO gallery (title, short_desc, description, image, is_slider) VALUES (:title, :short_desc, :description, :image, :is_slider)");
        $query->bindParam(':title', $title);
        $query->bindParam(':short_desc', $short_desc);
        $query->bindParam(':description', $description);
        $query->bindParam(':image', $image);
        $query->bindParam(':is_slider', $is_slider);
        $query->execute();
    }

    // обновление элемента галереи (для админки)
    public function updateItem($id, $title, $short_desc, $description, $image, $is_slider)
    {
        $query = $this->conn->prepare("UPDATE gallery SET title = :title, short_desc = :short_desc, description = :description, image = :image, is_slider = :is_slider WHERE id = :id");
        $query->bindParam(':id', $id);
        $query->bindParam(':title', $title);
        $query->bindParam(':short_desc', $short_desc);
        $query->bindParam(':description', $description);
        $query->bindParam(':image', $image);
        $query->bindParam(':is_slider', $is_slider);
        $query->execute();
    }

    // удаление элемента галереи (для админки)
    public function deleteItem($id)
    {
        $query = $this->conn->prepare("DELETE FROM gallery WHERE id = :id");
        $query->bindParam(':id', $id);
        $query->execute();
    }

    // получение количества всех элементов галереи (для пагинации)
    public function getItemsCount()
    {
        $query = $this->conn->query("SELECT COUNT(*) FROM gallery");
        $count = $query->fetchColumn();
        return $count;
    }
}