
<?php

// prendo dati da json
$string = file_get_contents('todo-list.json');

//  trasformo dati in oggetto modificabile 
$list = json_decode($string);


//logica per modificare json  

// header('Content-Type: application/json');

// trasformo oggetto modificabile in json
echo json_encode($list);