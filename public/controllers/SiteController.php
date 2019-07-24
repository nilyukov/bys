<?php



class SiteController {

    public function actionIndex(){


        if(isset($_POST['update']) && !empty($_POST['update'])){
            $update = $_POST['update'];
            $positions = $_POST['positions'];

            foreach ($positions as $position) {
                $index = $position[0];
                $newPosition = $position[1];

                FirstList::updatePositions($index, $newPosition);
                SecondList::updatePositions($index, $newPosition);
            }
        }

        $itemsFromFirst = FirstList::getItems();
        $itemsFromSecond = SecondList::getItems();

        require_once(ROOT . '/views/site/index.php');

        return true;
    }

    public function actionAdd(){


        if(isset($_POST['add']) && !empty($_POST['add'])){

            $idList = $_POST['idList'];
            $title = $_POST['title'];
            $idItem = $_POST['idItem'];
            $position = $_POST['position'];

            if($idList === 'firstList'){
                SecondList::addItemToList($title, $position);
                FirstList::deleteItemFromList($idItem);
            } else if($idList === 'secondList') {
                FirstList::addItemToList($title, $position);
                SecondList::deleteItemFromList($idItem);
            }
        }

        if(isset($_POST['itemFromFirstList']) && !empty($_POST['itemFromFirstList'])){
            $title = $_POST['itemFromFirstList'];
            FirstList::addItemToList($title);


        } else if(isset($_POST['itemFromSecondList']) && !empty($_POST['itemFromSecondList'])){
            $title = $_POST['itemFromSecondList'];
            SecondList::addItemToList($title);
        }

        header("Location: /");
        return true;
    }
}
