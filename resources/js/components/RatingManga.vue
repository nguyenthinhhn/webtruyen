<template>
    <div>
        <star-rating v-model="rating" v-bind:show-rating="false" v-bind:star-size="20" v-bind:increment="0.5"
                     @rating-selected="setRating"></star-rating>
    </div>
</template>

<script>
    export default {
        name: "rating-manga",
        data() {
            return {
                rating: this.manga_rate,
                rated: false,
            }
        },
        props: ['manga_id', 'manga_rate'],
        methods: {
            setRating(rating) {
                if (this.rated) {
                    alert(i18n.frontend.rated);
                } else {
                    this.rated = true;
                    let data = JSON.parse(localStorage.rated);
                    data[this.manga_id] = {
                        rating: rating,
                    };
                    localStorage.rated = JSON.stringify(data);
                    axios.post('/api/manga_rating', {
                        manga_id: this.manga_id,
                        rating: rating,
                    })
                        .then(response => {

                        })
                        .catch(error => alert(error));
                }
            },
        },
        mounted() {
            if (localStorage.rated) {
                let data = JSON.parse(localStorage.rated);
                if (data[this.manga_id]) {
                    this.rated = true;
                }
            } else {
                localStorage.rated = JSON.stringify({});
            }
        },
    }
</script>

<style scoped>

</style>
