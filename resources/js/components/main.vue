<template>
  <div class="container">
    <div class="row row-cols-1 row-cols-md-2 g-4">
      <div class="col" v-for="(post, index) in cards.posts" :key="index">
        <div class="card">
          <img :src="'/storage/' + post.image" :alt="post.title">
          <div class="card-body">
            <h5 class="card-title">{{post.name}}</h5>
            <p class="card-text">{{post.content}}</p>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-3 bg-light">
      <ul class="list-inline bg-light">
        <li class="list-inline-item"> <button v-if="cards.prev_page_url" class="btn btn-info" @click="changePage('prev_page_url')">Prev</button></li>
        <li class="list-inline-item"> <button v-if="cards.next_page_url" class="btn btn-info" @click="changePage('next_page_url')">Next</button></li>
      </ul>
    </div>
  </div>
</template>

<script>
import Axios from "axios";
  export default {
    name: "Main",
    props: ['cards'],
    methods:
    {
      changePage(vs){
        this.$emit('changePage', vs);
      }
    }
  }
</script>

<style lang="scss">

</style>

