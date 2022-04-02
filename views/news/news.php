<h1> Новости </h1>
<?php
foreach ($news as $id => $properties):
    if ($id == 'props') continue;
    ?>
    <div>
        <div>
            <h2><?=$properties->title?></h2>
            Описание: <?=$properties->text?><br><br>

            <form method="post" action="/news/show/?id=<?=$properties->id?>">
                <button>ПОДРОБНЕЙ</button>
            </form><br>
            <hr>
        </div>
    </div>
<?php endforeach;?>

<a href="/news/news/?page=<?=$page?>">Дальше</a>
