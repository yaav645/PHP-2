<?php

function add($x, $y) {
    return $x + $y;
}

if (add(1,2) == 4) {
    echo "ok";
}
else {
    echo "error Add";
}