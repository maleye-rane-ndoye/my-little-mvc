<?php

namespace App\Models;
use PDO;
use App\Models\GetCategory;



class GetProducts extends DatabaseLog 
{
    private $id;
    private $name;
    private $photos;
    private $price;
    private $description;
    private $quantity;
    private $createdAt;
    private $updatedAt;
    private $category_id;



    public function getAllProducts()
    {
        $pdo = $this->getBdd();

        
        $query = $pdo->prepare("SELECT * FROM product");
        $query->execute();
        $allProducts = $query->fetchAll(PDO::FETCH_ASSOC);

        return $allProducts;
    }


   public function getTheProduct()
    {
        $pdo = $this->getBdd();
        
        $productId = 7;

        
            $query = $pdo->prepare("SELECT * FROM product WHERE id = :id");
            $query->bindParam(':id', $productId, PDO::PARAM_INT);
            $query->execute();

            $productData = $query->fetch(PDO::FETCH_ASSOC);


            if ($productData['id'] === $productId) {
            
                
                return $productData;
            } else {
                echo "Aucun produit trouvé avec l'id $productId.";
            }

    }


   public function getProductsFromCategory()
    {
        $pdo = $this->getBdd();

        $categoryId = 4;

        $query = $pdo->prepare("SELECT * FROM product WHERE category_id = :category_id");
        $query->bindParam(':category_id', $categoryId, PDO::PARAM_INT);
        $query->execute();

        $productsOfCategoryData = $query->fetchAll(PDO::FETCH_ASSOC);

        return $productsOfCategoryData;
    }


    public function hydrate(array $data)
    {
        // Assumez que les clés dans le tableau $data correspondent aux propriétés de la classe Product
        foreach ($data as $key => $value) {
            // Utilisez la méthode magique __set pour définir la valeur de la propriété
            $this->{$key} = $value;
        }
    }





    public function findOneById(int $id)
    {
        $pdo = $this->getBdd();

        $query = $pdo->prepare("SELECT * FROM product WHERE id = :id");
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();

        $productData = $query->fetch(PDO::FETCH_ASSOC);

        if ($productData) {
            // Si des données ont été trouvées, créer une instance de la classe Product et l'hydrater
            $findproduct = new GetProduct();
            $findproduct->hydrate($productData);

            return $findproduct;
        } else {
            return false; // Aucun produit trouvé avec l'id spécifié
        }
    }




    public function findAll()
    {
        $pdo = $this->getBdd();

        $query = $pdo->prepare("SELECT * FROM product");
        $query->execute();
        $productsData = $query->fetchAll(PDO::FETCH_ASSOC);

        $products = [];

        foreach ($productsData as $productData) {
            // Créer une nouvelle instance de la classe Product
            $product = new GetProduct();

            // Hydrater l'instance avec les données récupérées
            $product->hydrate($productData);

            // Ajouter l'instance au tableau de produits
            $products[] = $product;
        }

        return $products;
    }


    public function create()

    {
    $pdo = $this->getBdd();

    $query = $pdo->prepare("INSERT INTO product (name, photos, price, description, quantity, createdAt, updatedAt, category_id) 
                            VALUES (:name, :photos, :price, :description, :quantity, :createdAt, :updatedAt, :category_id)");

    // Liaison des valeurs avec les paramètres de la requête
    $query->bindParam(':name', $this->name);
    $query->bindParam(':photos', $this->photos);
    $query->bindParam(':price', $this->price);
    $query->bindParam(':description', $this->description);
    $query->bindParam(':quantity', $this->quantity);
    $query->bindParam(':createdAt', $this->createdAt);
    $query->bindParam(':updatedAt', $this->updatedAt);
    $query->bindParam(':category_id', $this->category_id);


    $success = $query->execute();

    if ($success) {
        // Si l'insertion réussie, retourner l'instance de Product avec l'id nouvellement créée
        $this->id = $pdo->lastInsertId();
        return $this;
    } else {
        // Sinon, retourner false
        return false;
    }
    }






}