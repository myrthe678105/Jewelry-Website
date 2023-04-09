<?php
class Item implements \JsonSerializable{

    private int $id;
    private string $description;
    private string $colour;
    private int $price;
    private string $type;   
    private string $img;
    
    #[ReturnTypeWillChange]

    public function jsonSerialize()
    {
        $vars = get_object_vars($this);

        return $vars;
    }
    // Getter for id
    public function getId(): int {
        return $this->id;
    }

    // Setter for id
    public function setId(int $id): void {
        $this->id = $id;
    }

    // Getter for description
    public function getDescription(): string {
        return $this->description;
    }

    // Setter for description
    public function setDescription(string $description): void {
        $this->description = $description;
    }

    // Getter for colour
    public function getColour(): string {
        return $this->colour;
    }

    // Setter for colour
    public function setColour(string $colour): void {
        $this->colour = $colour;
    }

    // Getter for price
    public function getPrice(): int {
        return $this->price;
    }

    // Setter for price
    public function setPrice(int $price): void {
        $this->price = $price;
    }

    // Getter for type
    public function getType(): string {
        return $this->type;
    }

    // Setter for type
    public function setType(string $type): void {
        $this->type = $type;
    }
    // Getter for img
    public function getImg(): string {
        return $this->img;
    }

    // Setter for img
    public function setImg(string $img): void {
        $this->img = $img;
    }
    
}
