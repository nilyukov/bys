<?php include ROOT . '/views/layouts/header.php'?>



<div class="container">

    <div class="row">
        <div class="col-3 offset-2">
            <label>First List</label>
            <ul id="firstList" class="facet-list">
                <?php foreach($itemsFromFirst  as $item): ?>
                    <li class="facet" data-index="<?= $item['id']; ?>" data-position="<?= $item['position']; ?>"><?= $item['title']; ?></li>
                <?php endforeach;?>
            </ul>
            <form method="post" action="add">
                <div class="input-group mt-3">
                    <input type="text" class="form-control" name="itemFromFirstList" placeholder="Enter title..." aria-label="Recipient's username" aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-outline-secondary" id="button-addon2">+</button>
                    </div>
                </div>
            </form>

        </div>
        <div class="col-3 offset-1">
            <label>Second List</label>
            <ul id="secondList" class="facet-list">
                <?php foreach($itemsFromSecond  as $item): ?>
                    <li class="facet" data-index="<?= $item['id']; ?>" data-position="<?= $item['position']; ?>"><?= $item['title']; ?></li>
                <?php endforeach;?>
            </ul>
            <form method="post" action="add">
                <div class="input-group mt-3">
                    <input type="text" class="form-control" name="itemFromSecondList" placeholder="Enter title..." aria-label="Recipient's username" aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-outline-secondary" id="button-addon2">+</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include ROOT . '/views/layouts/footer.php'?>



