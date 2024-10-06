<?php

class FoodManager
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = $this->databaseConnection();
    }

    private function databaseConnection()
    {
        return new PDO('mysql:dbname=restaurantdb;host=localhost', 'root', '');
    }

    public function listFoods($offset,$search)
    {
        $subQuery = '';
        
        // Prepare the search condition if the search term is provided
        if ($search !== '' && $search !== null) {
            $subQuery = "WHERE LOWER(foodName) LIKE LOWER(:value)
              OR LOWER(idFood) LIKE LOWER(:value)
              OR LOWER(price) LIKE LOWER(:value)
              OR LOWER(Action_Date) LIKE LOWER(:value)
              OR LOWER(categorie.name) LIKE LOWER(:value)
              OR LOWER(mealtime.name) LIKE LOWER(:value)
              OR LOWER(subcategorie.name) LIKE LOWER(:value)"
              ;
        }

        $statement= $this->pdo->prepare("SELECT idFood, foodName, price, food_description, reviews, isInPromo, isAvailable, action_Date, categorie.name as categorie_name ,mealtime.name as mealtime_name, subcategorie.name as subcategorie_name , Image
        FROM food
        JOIN categorie on categorie.id_categorie=food.id_categorie
        JOIN subcategorie on subcategorie.id_Subcategorie=food.id_Subcategorie
        JOIN mealtime ON mealtime.id_mealTime=food.id_mealTime
        $subQuery
        LIMIT 6 OFFSET :offset");
        
         $statement->bindValue(':offset', $offset, PDO::PARAM_INT);
         if ($search !== '' && $search !== null) {
            $search = '%' . strtolower($search) . '%';
            $statement->bindValue(':value', $search);
        }
         $statement->execute();
         return $statement->fetchAll(PDO::FETCH_OBJ);
    }


    public function gridFoods($offset, $search) {
        // Initialize the subquery
        $subQuery = '';
        
        // Prepare the search condition if the search term is provided
        if ($search !== '' && $search !== null) {
            $subQuery = "WHERE LOWER(foodName) LIKE LOWER(:value)
              OR LOWER(idFood) LIKE LOWER(:value)
              OR LOWER(price) LIKE LOWER(:value)
              OR LOWER(Action_Date) LIKE LOWER(:value)
              OR LOWER(food_description) LIKE LOWER(:value)";
        }
    
        // Prepare the main query
        $query = "SELECT idFood, foodName, price, image, food_description FROM food $subQuery LIMIT 8 OFFSET :offset;";
        $statement = $this->pdo->prepare($query);
    
        // Bind the offset value
        $statement->bindValue(':offset', $offset, PDO::PARAM_INT);
    
        // If search term is provided, bind the search value with wildcards
        if ($search !== '' && $search !== null) {
            $search = '%' . strtolower($search) . '%';
            $statement->bindValue(':value', $search);
        }
    
        // Execute the query
        $statement->execute();
    
        // Fetch and return the results
        return $statement->fetchAll(PDO::FETCH_OBJ);
    }
    

    public function createFood($foodName, $price, $foodDescription,  $idCategorie, $idMealTime, $idSubcategorie, $image)
    {
        $sqlState = $this->pdo->prepare('INSERT INTO food (foodName, price, food_description,reviews,isInPromo,isAvailable,Action_Date, id_categorie, id_mealTime, id_Subcategorie, image) VALUES (?,?,?,5,0,1,NOW(),(SELECT categorie.id_categorie FROM categorie WHERE categorie.name=?),(SELECT mealtime.id_mealTime from mealtime WHERE mealtime.name=?),(SELECT subcategorie.id_Subcategorie FROM subcategorie WHERE subcategorie.name=?),?)');


        return $sqlState->execute([$foodName, $price, $foodDescription,$idCategorie, $idMealTime, $idSubcategorie,$image]);
    }

    public function editFood($idFood, $foodName, $price, $foodDescription, $isInPromo, $isAvailable, $idCategorie, $idMealTime, $idSubcategorie, $image)
    {
        if($image!=null){
        $sqlState = $this->pdo->prepare("UPDATE food
                               SET 
                               foodName = ? ,
                               price = ? ,
                               food_description = ? ,
                               isInPromo = ? ,
                               isAvailable = ? ,
                               id_categorie = (SELECT categorie.id_categorie FROM categorie WHERE categorie.name=?) ,
                               id_mealTime = (SELECT mealtime.id_mealTime from mealtime WHERE mealtime.name=?) ,
                               id_Subcategorie = (SELECT subcategorie.id_Subcategorie FROM subcategorie WHERE subcategorie.name=?) ,
                               image = ? 
                               WHERE idFood = ?");

        return $sqlState->execute([$foodName, $price, $foodDescription,$isInPromo,$isAvailable, $idCategorie, $idMealTime, $idSubcategorie, $image, $idFood]);
        }

        else{
            $sqlState = $this->pdo->prepare("UPDATE food
                               SET 
                               foodName = ? ,
                               price = ? ,
                               food_description = ? ,
                               isInPromo = ? ,
                               isAvailable = ? ,
                               id_categorie = (SELECT categorie.id_categorie FROM categorie WHERE categorie.name=?) ,
                               id_mealTime = (SELECT mealtime.id_mealTime from mealtime WHERE mealtime.name=?) ,
                               id_Subcategorie = (SELECT subcategorie.id_Subcategorie FROM subcategorie WHERE subcategorie.name=?) 
                               WHERE idFood = ? ");

        return $sqlState->execute([$foodName, $price, $foodDescription,$isInPromo, $isAvailable, $idCategorie, $idMealTime, $idSubcategorie,$idFood]);
        }
    }


    public function addPromo($idFood,$discount){
        if($this->getPromoCount($idFood)==0){
        $sqlState = $this->pdo->prepare("INSERT INTO promotion (id_Food,discount)
        VALUES (?,?);
       ") ;
        return $sqlState->execute([$idFood,$discount]);
        }
        else{
           $this->updatePromo($idFood,$discount);
        }

    }


    public function updatePromo($idFood,$discount){
        $sqlState = $this->pdo->prepare("UPDATE promotion SET promotion.discount=? where promotion.id_Food=?;") ;

        return $sqlState->execute([$discount,$idFood]);
    }

    public function getPromoCount($idFood){
        $sqlState = $this->pdo->prepare("SELECT COUNT(*) as count FROM promotion WHERE promotion.id_Food=?");
        $sqlState->execute([$idFood]);
        $result = $sqlState->fetchObject();
        
        if ($result === false) {
            // No rows found, return an appropriate value, like null or an empty object
            return null; // or return an empty stdClass object: return new stdClass();
        }
        
        return $result->count;
    }
    

    public function retrieveFood($idFood)
    {
        $sqlState = $this->pdo->prepare("SELECT idFood, foodName, price, food_description, reviews, isInPromo, isAvailable, action_Date, categorie.name as categorie_name ,mealtime.name as mealtime_name, subcategorie.name as subcategorie_name , Image
        FROM food
        JOIN categorie on categorie.id_categorie=food.id_categorie
        JOIN subcategorie on subcategorie.id_Subcategorie=food.id_Subcategorie
        JOIN mealtime ON mealtime.id_mealTime=food.id_mealTime
        WHERE food.idFood=?;
        ");
        $sqlState->execute([$idFood]);
        return $sqlState->fetch(PDO::FETCH_OBJ);
    }


    
    public function retrievePromo($idFood){
        $sqlState = $this->pdo->prepare("SELECT promotion.discount as discount FROM promotion WHERE promotion.id_Food=?;");
        $sqlState->execute([$idFood]);
        $result = $sqlState->fetch(PDO::FETCH_OBJ);
        
        if ($result === false) {
            // No rows found, return an appropriate value, like null or an empty object
            return null; // or return an empty stdClass object: return new stdClass();
        }
        
        return $result->discount;
    }

    public function deleteFood($idFood)
    {
        $sqlState = $this->pdo->prepare("DELETE FROM food WHERE idFood = ?");
        return $sqlState->execute([$idFood]);
    }
}
