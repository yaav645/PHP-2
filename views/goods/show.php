    <div>
        <div>
            <h2><?=$product->name?></h2>
            <!--    <img src="<?//=$img?>" width="150"><br> -->
            Картинка: нет<br><br>
            Описание: <?=$product->description?><br><br>
            Цена: <?=$product->price?><br><br>
            Likes: <?=$product->likes?><br><br><br>

            <form method="post" action="/basket/add/?id=<?=$product->id?>">
                <input type="text" name="id" value="<?=$product->id?>" hidden>
                <button>КУПИТЬ</button>
            </form>
            <hr>
        </div>
    </div>