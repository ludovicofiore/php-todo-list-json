
<?php

// prendo dati da json
$string = file_get_contents('todo-list.json');

//  trasformo dati in oggetto modificabile 
$list = json_decode($string);


//logica per modificare json

// se arriva elemento post aggiorno json
if(isset($_POST['newTask'])) {
    $newTask = $_POST['newTask'];

    // pusho elemento in lista
    $list[] = $newTask;

    // sovrascrivo json con lista aggiornata
    file_put_contents('todo-list.json', json_encode($list));
}  

// header('Content-Type: application/json');

// trasformo oggetto modificabile in json
echo json_encode($list);