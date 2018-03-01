<template>
    <div class="row">
        <div class="col-12 col-lg-12 col-xs-12 col-sm-12">
            <div class="centered">
                <h3> Section for offline experiments</h3>
            </div>
            <div v-for="image in dataset">
                <div class="col-md-4">
                    <div class="thumbnail">
                        <img :src="'Vyronasdbmin/' + image.image_name" :alt="image.image_name">

                        <div class="caption">
                          <button class = "btn btn-primary" role = "button" type="submit">Go!</button>
                          <p>Building:{{ image.building_id }}</p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="centered">
        <paginate
        :page-count="pageCount"
        :margin-pages="2"
        :page-range="4"
        :initial-page="0"
        :container-class="'pagination'"
        :click-handler="fetch"
        :prev-text="'Prev'"
        :next-text="'Next'"
        ></paginate>
    </div>    
</div>
</template>

<script>
export default {

    data() {
        return {
            dataset: [],
            pageCount: 1,
            endpoint: 'api/v1/dataset?page='
        };
    },

    created() {
        this.fetch();
    },

    methods: {
        fetch(page = 1) {
            axios.get(this.endpoint + page)
            .then(({data}) => {
                this.dataset = data.data;
                this.pageCount = data.meta.pagination.total_pages;
            });
        },

        report(id) {
            if(confirm('Are you sure you want to report this signature?')) {
                axios.put('api/v1/dataset/'+id)
                .then(response => this.removeImage(id));
            }
        },

        removeImage(id) {
            this.dataset = _.remove(this.image, function (image) {
                return image.id !== id;
            });
        }
    }
}
</script>