<?php

function diepage($msg){
    echo "<div style='color: red; background-color: #fcebed; padding: 40px; margin: 50px auto; width: 70%; border: 2px solid palevioletred; border-radius: 8px;font-size: large'>$msg</div";
    die();
}

function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}