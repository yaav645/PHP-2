<h1> Корзина </h1>
<?php

foreach ($basket as $id => $properties):

    ?>
    <div>
        <div>
            <h2><?=$id?> - <?=$properties['name']?></h2>
            <!--    <img src="<?=$img?>" width="150"><br> -->
            Описание: <?=$properties['description']?><br>
            Количество: <span id="<?=$properties['id']?>"><?=$properties['quantity']?></span><br>
            Цена: <?=$properties['price']?><br>
            Likes: <?=$properties['likes']?><br>

                <input type="text" name="id" value="<?=$properties['id']?>" hidden><br>
                <button class="buy" data-id="<?=$properties['id']?>">ДОБАВИТЬ</button>
                <button class="delete" data-id="<?=$properties['id']?>">УДАЛИТЬ</button>

            <hr>
        </div>
    </div>
<?php endforeach;?>

<script>
    let buttons = document.querySelectorAll('.buy');
    buttons.forEach((elem)=>{
        elem.addEventListener('click', ()=>{
            let id = elem.getAttribute('data-id');
            (
                async () => {
                    const response = await fetch('/basket/addAjax/?id=' + id);
                    const answer = await response.json();
                    console.log(answer)
                    document.getElementById(id).innerText = answer.quantity;
                }
            )();
        })
    });
    let buttonsD = document.querySelectorAll('.delete');
    buttonsD.forEach((elem)=>{
        elem.addEventListener('click', ()=>{
            let id = elem.getAttribute('data-id');
            (
                async () => {
                    const response = await fetch('/basket/delete/?id=' + id);
                    const answer = await response.json();
                    console.log(answer)
                    document.getElementById(id).innerText = answer.quantity;
                }
            )();
        })
    });
</script>


