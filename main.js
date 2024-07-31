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
            }
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
                    console.log(response.data);
                    this.list = response.data;
                }
                )

        }
    },

    mounted() {
        this.getApi();
    }

}).mount('#app');