<?php include ROOT . '/views/layouts/header.php' ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4 padding-right">
                <?php if ($result): ?>
                    <p>Данные отредактированы!</p>
                <?php else: ?>
                    <?php if (isset($errors) && is_array($errors)): ?>
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li> - <?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                    <div class="signup-form"><!--sign up form-->
                        <h2>Обратная связь</h2>
                        <form action="#" method="post">
                            <input type="email" name="userEmail" placeholder="E-mail"
                                   value="<?php echo $userEmail; ?>"/>
                            <input type="password" name="userText" placeholder="Message"
                                   value="<?php echo $userText; ?>"/>
                            <input type="submit" name="submit" class="btn btn-default" value="Send"/>
                        </form>
                    </div><!--/sign up form-->
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php' ?>
