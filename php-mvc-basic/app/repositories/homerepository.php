<?php
require __DIR__ . '/repository.php';
require __DIR__ . '/../models/item.php';
class HomeRepository extends Repository{

    public function getAll()
    {
        try {
            $stmt = $this->connection->prepare("SELECT id, description, colour, price, type, img FROM Items");
            $stmt->execute();

            $items = [];

            while ($row = $stmt->fetch()) {
                $itemId = $row['id'];

                if (!isset($items[$itemId])) {
                    $item = new Item();
                    $item->setId($row['id']);
                    $item->setDescription($row['description']);
                    $item->setColour($row['colour']);
                    $item->setPrice($row['price']);
                    $item->setType($row['type']);
                    $item->setImg($row['img']);

                    $items[$itemId] = $item;
                }
            }

            return array_values($items);
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function getById($id)
    {
    try {
        $stmt = $this->connection->prepare("SELECT id, description, colour, price, type, img FROM Items WHERE id = ?");
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();

        $row = $stmt->fetch();

        if ($row) {
            $item = new Item();
            $item->setId($row['id']);
            $item->setDescription($row['description']);
            $item->setColour($row['colour']);
            $item->setPrice($row['price']);
            $item->setType($row['type']);
            $item->setImg($row['img']);

            return $item;
        } else {
            echo "Item not found";
        }
    } catch (PDOException $e) {
        echo $e;
    }
}


}

