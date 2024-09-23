<?php

/**
 * @return array
 */
function getItemDetailsById($db, $objectId)
{
    $statement = $db->prepare("SELECT * FROM objects WHERE id = :id");

    $statement->bindValue(':id', $objectId);

    $statement->execute();

    return $statement->fetch(PDO::FETCH_ASSOC);


}

/**
 * @param $id
 * @return mixed
 */
function getAllPublicItem($db)
{
    $query = "SELECT * FROM objects";

    $result = mysqli_query($db, $query)
    or die('error: '.mysqli_error($db));

    $products = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $products[] = $row;

    }
    mysqli_close($db);
    foreach ($products as $product){
        $product['id'];
        $product['user_id'];
        $product['name'];
        $product['description'];
        $product['file_path'];
        $product['share'];
    }


    return  [
        "id" => $products[0]['id'],
        "user_id" => $products[0]['user_id'],
        "name" => $products[0]['name'],
        "description" => $products[0]['description'],
        "file_path" => $products[0]['file_path'],
        "share" => $products[0]['share'],
    ];
}
//class item
//{
//    public function getItemDetails($db)
//    {
//        $tags = [
//            1 => [
//                "user_id" => "test",
//                "name" => "test",
//                "description" => "test",
//                "file_path" => "test",
//                "share" => "test"
//
//            ]
//        ];
//        echo $db;
//
//    }
//}
//
//$bar = new item;
//$bar->getItemDetails();

