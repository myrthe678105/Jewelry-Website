<?php
require __DIR__ . '/item.php';
class Order implements \JsonSerializable {
    private int $id;
    private int $userid;
    private int $itemid;
    private DateTime $dateOfOrder; 
    private string $status;
    private Item $item;
    
    #[ReturnTypeWillChange]

    public function jsonSerialize()
    {
        $vars = get_object_vars($this);

        return $vars;
    }
    public function __construct() {
        $this->dateOfOrder = new DateTime();
        $this->item = new Item();
    }

        // Getter for id
        public function getId(): int {
            return $this->id;
        }
    
        // Setter for id
        public function setId(int $id): void {
            $this->id = $id;
        }
    
        // Getter for userid
        public function getUserId(): int {
            return $this->userid;
        }
    
        // Setter for userid
        public function setUserId(int $userid): void {
            $this->userid = $userid;
        }
    
        public function getDateOfOrder(): DateTime {
            return $this->dateOfOrder;
        }
    
        public function setDateOfOrder(DateTime $dateOfOrder): void {
            $this->dateOfOrder = $dateOfOrder;
        }

        // Getter for status
        public function getStatus(): string {
            return $this->status;
        }
    
        // Setter for status
        public function setStatus(string $status): void {
            $this->status = $status;
        }

        // Getter for itemid
        public function getItemId(): int {
            return $this->itemid;
        }

        // Setter for itemid, takes an Item object as parameter
        public function setItem(Item $item): void {
            $this->itemid = $item->getId();
            $this->item = $item;
        }

        // Getter for item
        public function getItem(): Item {
            return $this->item;
        }
}