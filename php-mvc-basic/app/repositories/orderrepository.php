<?php
require __DIR__ . '/repository.php';
require __DIR__ . '/../models/order.php';

class OrderRepository extends Repository {

    public function getAll() {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM Orders");
            $stmt->execute();
    
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Order');
            $orders = $stmt->fetchAll();
    
            // Fetch and set the linked Item object for each Order object
            foreach ($orders as $order) {
                $item = $this->getItemById($order->getItemId());
                $order->setItem($item);
            }
    
            return $orders;
    
        } catch (PDOException $e) {
            echo $e;
        }
    }
    
    public function getOneCart($id) {
        try {
            $stmt = $this->connection->prepare("
                SELECT Items.*, Orders.*
                FROM Orders
                INNER JOIN Items ON Items.ID = Orders.ItemID
                WHERE Orders.UserID = :id
            ");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
    
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Order');
            $orders = $stmt->fetchAll();
            // Loop through the orders and set the linked Item object for each order
            foreach ($orders as $order) {
                $item = new Item();
                $item = $this->getItemById($order->getItemId());
                $order->setItem($item);
            }
            return $orders;
    
        } catch (PDOException $e) {
            echo $e;
        }
    }
    
    
    // Helper method to fetch an Item object by ID
    private function getItemById($id) {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM Items WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Item');
            $item = $stmt->fetch();
            return $item;
        } catch (PDOException $e) {
            echo $e;
        }
    }
    public function insertOrder($userid, $itemid){
        try {
            $stmt = $this->connection->prepare("INSERT INTO Orders (id, userid, itemid, status, dateofpurchase) VALUES (NULL, :userid, :itemid, :status, :date)");
            $stmt->bindParam(':userid', $userid);
            $stmt->bindParam(':itemid', $itemid);
            $stmt->bindValue(':status', "cart");
            $stmt->bindParam(':date', date('Y-m-d H:i:s'));
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function updateOrder($order){
        try {
            $status = "paid"; // Replace with the new status value
            $date = date('Y-m-d H:i:s'); // Replace with the new date value
            $stmt = $this->connection->prepare("UPDATE Orders SET status = :status, dateofpurchase = :date WHERE id = :id");
            $stmt->bindParam(':status', $status);
            $stmt->bindParam(':date', $date);
            $stmt->bindParam(':id', $order);
            $stmt->execute();
            
        } catch (PDOException $e) {
            echo $e;
        }
    }
    
}