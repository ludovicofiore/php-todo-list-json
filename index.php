<?php 




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List php</title>
    <!-- import axios -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.7.2/axios.min.js" integrity="sha512-JSCFHhKDilTRRXe9ak/FJ28dcpOJxzQaCd3Xg8MyF6XFjODhy/YMCM8HW0TFDckNHWUewW+kfvhin43hKtJxAw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- import vue -->
    <script src='https://unpkg.com/vue@3/dist/vue.global.js'></script>
    <!-- import fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- import bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- css -->
     <link rel="stylesheet" href="css/style.css">
</head>
<body>
 
<div id="app">

    <div class="container-fluid">

        <div class="col-5 mx-auto text-center">
            <h1 class="mt-4">
                Todo List
            </h1>
        </div>

        <!-- lista -->
        <div class="row justify-content-center">
            <div class="col-6 mt-5">
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center" v-for="(singleTask, index) in list" :key="index" :class="singleTask.status === 'done' ? 'text-decoration-line-through' : ''" @click="changeStatus(index)">
                        {{singleTask.task}}
                        <button @click="removeTask(index)" v-if="singleTask.status === 'done'" type="button" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                    </li>
                    
                </ul>
            </div>
        </div>

        <!-- input -->
        <div class="row justify-content-center">
            <div class="col-6 mt-4">
                <!-- <form @submit.prevent="inputTask">
                    <div class="input-group mb-3">
                        <input v-model="newTask.task" type="text" class="form-control" placeholder="Inserisci un elemento..." aria-label="Recipient's username" aria-describedby="button-addon2">
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Inserisci</button>
                    </div>
                </form> -->
                <div class="input-group mb-3">
                    <input @keyup.enter="inputTask" v-model="newTask.task" type="text" class="form-control" placeholder="Inserisci un elemento..." aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button @click="inputTask" class="btn btn-outline-secondary" type="submit" id="button-addon2">Inserisci</button>
                </div>
                
            </div>
        </div>
    </div>

</div>

<!-- script vue -->
 <script src="./main.js"></script>

<!-- script bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>