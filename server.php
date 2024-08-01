
<?php

// prendo dati da json
$string = file_get_contents('todo-list.json');

//  trasformo dati in oggetto modificabile (true per risolvere errore stdClass)
$list = json_decode($string, true);


//logica per modificare json

// se arriva elemento post aggiorno json
if(isset($_POST['newTask'])) {
    $newTask = $_POST['newTask'];

    // pusho elemento in lista
    $list[] = $newTask;

    // sovrascrivo json con lista aggiornata
    file_put_contents('todo-list.json', json_encode($list));
}  


// al click cambio status
if(isset($_POST['indexStatus']) && isset($_POST['status'])) {
    // specifico variabili
    $index = $_POST['indexStatus'];
    $status = $_POST['status'];

    // cambio stato
    $list[$index]['status'] = $status;
    
    // sovrascrivo json con lista aggiornata
    file_put_contents('todo-list.json', json_encode($list));
}

// header('Content-Type: application/json');

// trasformo oggetto modificabile in json
echo json_encode($list);