<?php





// Add Location datas to data base

function insertLocation($datas){

    global $pdo;

    $sql = "INSERT INTO locations (title,lng,lat,type) VALUES (:title,:lng,:lat,:typ);";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([':title'=>$datas['title'],':lng'=>$datas['lng'],':lat'=>$datas['lat'],':typ'=>$datas['type'],]);

    return $stmt->rowCount();

}


// Get locations from database

function getLocations($params){

    // TODO: add params to fetch active or inactive locations
   $query = "";

    if(isset($params['verified']) and in_array($params['verified'],[1,0])){
        $query = "where verified = {$params['verified']}";
       
    }else if(isset($params['keyword'])){
        
        $query = "WHERE title LIKE '%{$params['keyword']}%' AND verified = 1;";
    }
    global $pdo;
    $sql = " SELECT * FROM locations {$query};";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_OBJ);
    
}

function getLocByID($id){

    global $pdo;

    $sql = 'SELECT * FROM locations where id = :id;';

    $stmt = $pdo->prepare($sql);

    $stmt->execute(['id'=>$id]);

    return $stmt -> fetch(PDO::FETCH_OBJ);

}


function toggleStatus($locID){

    global $pdo;

    $sql = 'UPDATE locations SET verified = 1 - verified WHERE id = :id';

    $stmt = $pdo->prepare($sql);

    $stmt->execute(['id'=>$locID]);

    return $stmt -> rowCount();


}