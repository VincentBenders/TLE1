<?php

/**
 * @return array
 */
function getItemDetails($db)
{
    /** @var $db */
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

/**
 * @param $id
 * @return mixed
 */
function getDishDetails($id)
{
    $tags = [
        1 => [
            "name" => "Black Knife",
            "description" => "Dagger once belonging to one of the assassins who murdered Godwyn the Golden on the Night of the Black Knives. ",
            "tags" => ['strength', 'dexterity', 'melee']
        ],
        2 => [
            "name" => "Sword of Night and Flame",
            "description" => "One of the legendary armaments.",
            "tags" => ['strength', 'dexterity', 'intelligence', 'faith', 'melee']
        ],
        3 => [
            "name" => "Blasphemous Blade",
            "description" => "Sacred sword of Rykard, Lord of Blasphemy.",
            "tags" => ['strength', 'dexterity', 'faith', 'melee', 'boss weapon']
        ],
        4 => [
            "name" => "Maliketh\'s Black Blade",
            "description" => "Maliketh's black blade which once harbored the power of the Rune of Death.",
            "tags" => ['strength', 'dexterity', 'faith', 'melee', 'boss weapon']
        ],
        5 => [
            "name" => "Hand of Malenia",
            "description" => "Blade built into Malenia's prosthetic arm.",
            "tags" => ['strength', 'dexterity', 'melee', 'boss weapon']
        ],
        6 => [
            "name" => "Eleonora\'s Poleblade",
            "description" => "Twinned naginata forged in the Land of Reeds.",
            "tags" => ['strength', 'dexterity', 'arcane', 'melee']
        ],
        7 => [
            "name" => "Warped Axe",
            "description" => "Oversized double-headed axe with a bizarre, almost melted appearance.",
            "tags" => ['strength', 'melee']
        ],
        8 => [
            "name" => "Winged Scythe",
            "description" => "Sacred scythe resembling a pair of white wings",
            "tags" => ['strength', 'dexterity', 'faith', 'melee']
        ],
        9 => [
            "name" => "Erdtree Bow",
            "description" => "Longbow featuring Erdtree styling.",
            "tags" => ['strength', 'dexterity', 'faith', 'ranged']
        ],
        10 => [
            "name" => "Golem Greatbow",
            "description" => "Weapon of the Guardian Golem.",
            "tags" => ['strength', 'dexterity', 'ranged']
        ]
    ];

    return $tags[$id];
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

