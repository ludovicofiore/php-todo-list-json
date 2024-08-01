const { createApp } = Vue;

createApp({

    data() {
        return {
            apiUrl: 'server.php',
            // array per risposte da api
            list: [],

            // oggetto per nuove task
            newTask: {
                task: '',
                status: 'undone'
            },

        }
    },

    methods: {
        // chiamata api
        getApi() {
            axios.get(this.apiUrl)
                .then(response => {
                    this.list = response.data;
                }
                )

        },

        // aggiungere nuova task da input
        inputTask() {
            const data = {
                newTask: this.newTask
            }

            // faccio chiamata in post per ogni elemento da aggiungere 
            axios.post(this.apiUrl, data, {
                headers: { 'Content-Type': 'multipart/form-data' }
            })
                .then(response => {
                    // console.log(response.data);
                    this.list = response.data;
                }
                )

        },

        // funzione per cambio status
        changeStatus(index) {

            // variabili per passaggio dati in php
            let newStatus = this.list[index].status === 'done' ? 'undone' : 'done';
            let data = {
                indexStatus: index,
                status: newStatus
            }
            // chiamta api
            axios.post(this.apiUrl, data, {
                headers: { 'Content-Type': 'multipart/form-data' }
            })
                .then(response => {
                    // cambio status
                    this.list[index].status = newStatus;
                    // console.log(response.data);
                }
                )
        },


        // funzione per eliminare task
        removeTask(index) {
            const data = {
                taskToDelete: index,
            }

            axios.post(this.apiUrl, data, {
                headers: { 'Content-Type': 'multipart/form-data' }
            })
                .then(response => {
                    console.log(response.data);
                    this.list = response.data;
                    // this.list.splice(index, 1);
                }
                )
        }
    },

    mounted() {
        this.getApi();
    }

}).mount('#app');