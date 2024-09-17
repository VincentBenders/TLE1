<?php

//

/**
 * @return array
 */
function getItems()
{
    return [
        [
            "id" => 1,
            "name" => "Black Knife",
            "type" => "Dagger",
        ],
        [
            "id" => 2,
            "name" => "Sword of Night and Flame",
            "type" => "Straight Sword",
        ],
        [
            "id" => 3,
            "name" => "Blasphemous Blade",
            "type" => "Greatsword",
        ],
    ];
}

/**
 * @param $id
 * @return mixed
 */
function getItemDetails($id)
{
    $tags = [
        1 => [
            "user_id" => "",
            "name" => "",
            "description" => "",
            "file_path" => "",
            "share" => ""
            
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
    ];

    return $tags[$id];
}