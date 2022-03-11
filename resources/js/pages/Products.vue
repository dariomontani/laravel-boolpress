<template>
    <div>
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h1>Products</h1>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <form action="">
                    <select name="orderbycolumn" id="orderbycolumn" v-model="form.orderbycolumn">
                        <option value="name">name</option>
                        <option value="price">price</option>
                        <option value="created_at">created_at</option>
                        <option value="updated_at">updated_at</option>
                    </select>
                    <select name="orderbysort" id="orderbysort" v-model="form.orderbysort">
                        <option value="asc">asc</option>
                        <option value="desc">desc</option>
                    </select>
                    <input type="submit" value="Search" @click.prevent="searchPosts">
                    </form>
                </div>
            </div>
            <Main :cards="cards" @changePage="changePage($event)"></Main>
        </div>
    </div>
</template>

<script>
import Axios from "axios";
import Main from '../components/Main.vue';

export default {
    name: 'Products',
    components: {
        Main
    },
    data(){
      return{
          form: {
              orderbycolumn: 'name',
              orderbysort: 'desc',
          },
            cards: {
                posts: null,
                next_page_url: null,
                prev_page_url: null,
            }
        }
        },

        created() {
        this.getPosts('http://127.0.0.1:8000/api/posts');
        },    

        methods: {
        changePage(vs) {
            let url = this.cards[vs];
            console.log(url)
            if(url) {
            this.getPosts(url);
            }
        },
        getPosts(url){
            Axios.get(url).then(
            (result) => {
                this.cards.posts = result.data.results.posts;
                this.cards.next_page_url = result.data.results.next_page_url;
                this.cards.prev_page_url = result.data.results.prev_page_url;
            });
        },
        searchPosts() {
            console.log('search', this.form.orderbycolumn, this.form.orderbysort);
            const url = 'http://127.0.0.1:8000/api/posts/search';
            Axios.get(url, {params: this.form}).then(
            (result) => {
                this.cards.posts = result.data.results.posts;
                this.cards.next_page_url = result.data.results.next_page_url;
                this.cards.prev_page_url = result.data.results.prev_page_url;
            });
        }
    }
}
</script>

<style lang="scss">

</style>