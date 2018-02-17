<template>
    <div class='row'>
        <h4>All images</h4>
        <ul>
            <li v-for="image in laravelData.data" v-text="image.name">
                {{ image.name }}
            </li>
        </ul>
 
        <pagination :data="laravelData" v-on:pagination-change-page="getResults"></pagination>
        <pagination :data="laravelData">
            <span slot="prev-nav">&lt; Previous</span>
            <span slot="next-nav">Next &gt;</span>
        </pagination>        
    </div>
</template>

<script>
Vue.component('example-component', {
 
    data() {
        return {
            // Our data object that holds the Laravel paginator data
            laravelData: {},
        }
    },
 
    created() {
        // Fetch initial results
        this.getResults();
    },
 
    methods: {
        // Our method to GET results from a Laravel endpoint
        getResults(page) {
            if (typeof page === 'undefined') {
                page = 1;
            }
 
            // Using vue-resource as an example
            this.$http.get('api/v2/images?page=' + page)
                .then(response => {
                    return response.json();
                }).then(data => {
                    this.laravelData = data;
                });
        }
    }
 
});
</script>