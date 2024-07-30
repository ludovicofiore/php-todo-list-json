const { createApp } = Vue;

createApp({

    data() {
        return {
            apiUrl: 'server.php',
            // array per risposte da api
            list: [],
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
        }
    },

    mounted() {
        this.getApi();
    }

}).mount('#app');