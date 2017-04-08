<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/class/account.class.php';
    $accountsClass = new Account();
    $id = (int)$_GET['id'];
    $account = $accountsClass->getItemById($id);
    $accountNext = $accountsClass->getNextItemById($id);
    if(!isset($accountNext[0])){
       $accountNext = $accountsClass->getItemById(0);
    }
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
    	<div class="content">
            <div class="info_account">
                <div class="info_sale">
                    <h1><?php echo $account[0]['title'];?></h1>
                    <div class="contacts_info">
                        <a href="#">Наша группа в ВК</a>
                        <a href="#">Отзывы</a>
                        <a href="#">Свзать с агентом</a>
                    </div>
                    <div class="presentation_goods">
                        <div>
                            <img src="/image/<?php echo $account[0]['wayPicturesBig'];?>.png">
                        </div>
                        <div>
                            <span class="price_sale"><?php echo $account[0]['price'];?> RUB</span>
                            <span class="condition"> В наличии!</span>
                            <a href="#" class="button_buy">Купить</a>
                            <div class="lot">
                                <div class="block_1">
                                    <div class="block_image"><a href="sale.php?id=<?php echo $accountNext[0]['id']?>"><img src="/image/<?php echo $accountNext[0]["wayPicturesLittle"];?>.png"></a></div>
                                    <div class="block_text"><p class="text"><?php echo $accountNext[0]["title"];?></p></div>
                                    <div class="block_button">
                                        <a href="#" class="button">Купить</a>
                                        <span class="price_account"><?php echo $accountNext[0]["price"];?></span>
                                        <span class="currency">rub</span>
                                    </div>
                                </div>
                            </div>

                        </div>

                         
                    </div>
                   
                </div>
                <div class="description">
                    <h3>Описание</h3>
                    <p><?php echo $account[0]['description'];?>  </p>
                </div>
            </div>
    	</div>
    	<div class="footer">
    		<?php require('../footer.php'); ?>
    	</div>

    </body>
</html>
