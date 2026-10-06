<?php

class DishManager extends AbstractManager
{
    public function getAllDishes(): array
    {
        $query = $this->db->query("SELECT * FROM dishes");
        $dishesData = $query->fetchAll(PDO::FETCH_ASSOC);

        $dishes = [];
        foreach ($dishesData as $dishData) {
            $dishes[] = new Dish(
                $dishData['id'],
                $dishData['name'],
                $dishData['ingredients'],
                $dishData['price']
            );
        }

        return $dishes;
    }

    public function getDishById(int $id): ?Dish
    {
        $query = $this->db->prepare("SELECT * FROM dishes WHERE id = :id");
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
        $dishData = $query->fetch(PDO::FETCH_ASSOC);

        if ($dishData) {
            return new Dish(
                $dishData['id'],
                $dishData['name'],
                $dishData['ingredients'],
                $dishData['price']
            );
        }

        return null;
    }

    public function createDish(string $name, string $ingredients, int $price): void
    {
        $query = $this->db->prepare("INSERT INTO dishes (name, ingredients, price) VALUES (:name, :ingredients, :price)");
        $query->bindParam(':name', $name);
        $query->bindParam(':ingredients', $ingredients);
        $query->bindParam(':price', $price, PDO::PARAM_INT);
        $query->execute();
    }

    public function updateDish(int $id, string $name, string $ingredients, int $price): void
    {
        $query = $this->db->prepare("UPDATE dishes SET name = :name, ingredients = :ingredients, price = :price WHERE id = :id");
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->bindParam(':name', $name);
        $query->bindParam(':ingredients', $ingredients);
        $query->bindParam(':price', $price, PDO::PARAM_INT);
        $query->execute();
    }

    public function deleteDish(int $id): void
    {
        $query = $this->db->prepare("DELETE FROM dishes WHERE id = :id");
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
    }
}