<?php  
    include_once $_SERVER['DOCUMENT_ROOT'] . '/class/account.class.php';
    $accountsClass = new Account();
    $accounts = $accountsClass->getAll();    
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Купить</title>
		<link  rel="stylesheet" href="../css/style.css" type="text/css"/>
    </head>
    <body>
    	<div class="header">
    		<?php require('../header.php'); ?>
    	</div>
    	<div class="content content_buy">
            <h1>Лучшие акаунты на dota.ru</h1>
            <div class="contacts_info">
                <a href="#">Наша группа в ВК</a>
                <a href="#">Отзывы</a>
                <a href="#">Свзать с агентом</a>
            </div>
            <div class="table_account">
                <?php foreach ($accounts as $account => $value) { ?>
                    <div class="block_1">
                            <div class="block_image"><a href="sale.php?id=<?php echo $value['id']?>"><img src="/image/<?php echo $value["wayPicturesLittle"];?>.png"></a></div>
                            <div class="block_text"><p class="text"><?php echo $value["title"];?></p></div>
                            <div class="block_button">
                                <a href="#" class="button">Купить</a>
                                <span class="price_account"><?php echo $value["price"];?></span>
                                <span class="currency">rub</span>
                            </div>
                        </div>
                <?php } ?>
            </div>     
    	</div>
    	<div class="footer">
    		<?php require('../footer.php'); ?>
    	</div>

    </body>
</html>
