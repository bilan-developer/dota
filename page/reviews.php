<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/class/reviews.class.php';
    $reviewsClass = new Reviews();
    $reviews = $reviewsClass->getAll();    
    
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Отзывы</title>
		<link  rel="stylesheet" href="../css/style.css" type="text/css"/>
    </head>
    <body>
    	<div class="header">
    		<?php require('../header.php'); ?>
    	</div>
    	<div class="content">
            <div class="info_reviews">
                <h1>Отзывы о data.ru</h1>
                <div class="links_vk">
                    <a href="#">Обратная связь</a>
                    <a href="#">Присоединяйтесь в VK</a>
                    <a href="#">Отзывы в VK</a>
                </div>
                <span>Все ваши отзывы очень важны для нас, пожалуйста оставте коментрий. Заранее Спасибо</span>
                <a class="add_reviews" href="#">Оставить отзыв...</a>
                <div class="reviews">
                    <?php foreach ($reviews as $key => $value) { 
                        if($value['status']==1){ ?>
                            <div class="review">
                                <span class="review_nik"><?php echo $value['nick']; ?></span>
                                <span class="review_date"><?php echo $value['date']; ?></span>
                                <p class="review_text"><?php echo $value['text']; ?></p>
                            </div>
                    <?php }
                    } ?>
                    
                </div>
        	</div>	
    	</div>
    	<div class="footer">
    		<?php require('../footer.php'); ?>
    	</div>

    </body>
</html>
