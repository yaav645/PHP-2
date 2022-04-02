<h1> Каталог товаров </h1>
<?php
foreach ($catalog as $id => $properties):
    ?>
    <div>
        <div>
            <h2><?=$properties->name?></h2>
            <!--    <img src="<?=$img?>" width="150"><br> -->
            Описание: <?=$properties->description?><br>
            Цена: <?=$properties->price?><br>
            Likes: <?=$properties->likes?><br><br>

            <form method="post" action="/goods/show/?id=<?=$properties->id?>">
                <button>ПОДРОБНЕЙ</button>
            </form><br>

            <form method="post" action="/basket/add/?id=<?=$properties->id?>">
                <button>КУПИТЬ</button>
            </form>
            <hr>
        </div>
    </div>
<?php endforeach;?>

<a href="/goods/catalog/?page=<?=$page?>">Дальше</a>
