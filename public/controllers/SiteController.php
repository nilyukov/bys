<?php


class SiteController
{

    public function actionIndex()
    {

        require_once(ROOT . '/views/site/index.php');
        return true;
    }

    public function actionAdd()
    {

        if (isset($_POST['add']) && !empty($_POST['add'])) {

            $idList = $_POST['idList'];
            $title = $_POST['title'];
            $idItem = $_POST['idItem'];
            $position = $_POST['position'];

            if ($idList === 'list0') {
                SecondList::addItemToList($title, $position);
                FirstList::deleteItemFromList($idItem);
            } else if ($idList === 'list1') {
                FirstList::addItemToList($title, $position);
                SecondList::deleteItemFromList($idItem);
            }
        }

        if (isset($_POST['itemFromFirstList']) && !empty($_POST['itemFromFirstList'])) {
            $title = $_POST['itemFromFirstList'];
            FirstList::addItemToList($title);


        } else if (isset($_POST['itemFromSecondList']) && !empty($_POST['itemFromSecondList'])) {
            $title = $_POST['itemFromSecondList'];
            SecondList::addItemToList($title);
        }

        header("Location: /");

        return true;
    }

    public function actionUpdate()
    {

        if (isset($_POST['update']) && !empty($_POST['update'])) {
            $update = $_POST['update'];
            $positions = $_POST['positions'];
            $idList = $_POST['idList'];


            if ($idList === 'list0') {
                foreach ($positions as $position) {
                    $index = $position[0];
                    $newPosition = $position[1];

                    FirstList::updatePositions($index, $newPosition);

                }
            } else if ($idList === 'list1') {
                foreach ($positions as $position) {
                    $index = $position[0];
                    $newPosition = $position[1];

                    SecondList::updatePositions($index, $newPosition);
                }
            }
        }

        header("Location: /");


    }

    public function actionGetList($id)
    {

        $items = null;

        switch ($id) {
            case 0:
                $items = FirstList::getItems();;
                break;
            case 1:
                $items = SecondList::getItems();
                break;
        }

        $data = [
            (object)$items
        ];

        $data = json_encode($data);

        echo $data;
    }


}
