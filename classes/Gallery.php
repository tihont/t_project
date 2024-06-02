<?php


class Gallery extends Db
{
    
    private $limit = __IMAGES_PER_PAGE__;

    
    public function getItems($page = 1)
    {
        $offset = ($page - 1) * $this->limit;
        $query = $this->conn->query("SELECT * FROM gallery LIMIT $this->limit OFFSET $offset");
        $gallery = $query->fetchAll(PDO::FETCH_ASSOC);
        return $gallery;
    }

   
    public function getSliderItems()
    {
        $query = $this->conn->query("SELECT * FROM gallery WHERE is_slider = 1");
        $gallery = $query->fetchAll(PDO::FETCH_ASSOC);
        return $gallery;
    }

    
    public function getAllItems()
    {
        $query = $this->conn->query("SELECT * FROM gallery");
        $gallery = $query->fetchAll(PDO::FETCH_ASSOC);
        return $gallery;
    }

    
    public function getItem($id)
    {
        $query = $this->conn->query("SELECT * FROM gallery WHERE id = $id LIMIT 1");
        $gallery = $query->fetchAll(PDO::FETCH_ASSOC);
        return $gallery;
    }

    
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

    
    public function deleteItem($id)
    {
        $query = $this->conn->prepare("DELETE FROM gallery WHERE id = :id");
        $query->bindParam(':id', $id);
        $query->execute();
    }

    
    public function getItemsCount()
    {
        $query = $this->conn->query("SELECT COUNT(*) FROM gallery");
        $count = $query->fetchColumn();
        return $count;
    }
}