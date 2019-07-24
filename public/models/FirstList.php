<?php

class FirstList {
    public static function getItems(){

        $db = Database::getConnection();

        $result = $db->query('SELECT id, title, firstList.position FROM firstList ORDER BY firstList.position');

        $items = [];
        foreach($result as $row) {
            $items[] = array(
                'id' => $row['id'],
                'title' => $row['title'],
                'position' => $row['position']
            );
        }
        return $items;
    }

    public static function addItemToList($title, $position){
        $db = Database::getConnection();

        $sql = 'INSERT INTO firstList '
            . '(title, firstList.position)'
            . 'VALUES '
            . '(:title, :pos)';


        $result = $db->prepare($sql);
        $result->bindParam(':title', $title, PDO::PARAM_STR);
        $result->bindParam(':pos', $position, PDO::PARAM_STR);
        $result->execute();
    }

    public static function updatePositions($index, $position){
        $db = Database::getConnection();

        $sql = 'UPDATE firstList SET '
            . 'firstList.position = :pos '
            . 'WHERE id = :index';


        $result = $db->prepare($sql);
        $result->bindParam(':index', $index, PDO::PARAM_STR);
        $result->bindParam(':pos', $position, PDO::PARAM_STR);
        $result->execute();
    }

    public static function deleteItemFromList($idItem){
        $db = Database::getConnection();

        $sql = 'DELETE FROM firstList WHERE id= :idItem';

        $result = $db->prepare($sql);
        $result->bindParam(':idItem', $idItem, PDO::PARAM_STR);
        $result->execute();
    }


}