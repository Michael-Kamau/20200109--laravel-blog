<template>
    <div>
        <h2>Blogs</h2>
        <addblog  v-on:getBlogEvent="fetchBlogs"></addblog>
        <div class="card card-body mb-2" v-for="blog in blogs" v-bind:key="blog.id">
            <h3>{{blog.title}}</h3>
            <p>{{blog.content}}</p>
            <button type="button" class="btn btn-primary" @click="deleteBlog(blog.id)">Delete</button>
        </div>
    </div>

</template>

<script>

    import addblog from "./AddBlog.vue";
    import axios from "axios"

    export default {

        name: "Blogs",
        components:{addblog},
        data() {
            return {
                blogs: [],
                blog: {
                    id: '',
                    title: '',
                    content: ''
                },
                blog_id: '',
                pagination: {},
                edit: false

            }
        },
        methods: {
            fetchBlogs() {
                fetch('http://blogs.appp/api')
                    .then(res => res.json())
                    .then(res => {
                        this.blogs = res.data;
                        console.log(res.data)
                    })
            },
            deleteBlog($id){
                axios.delete(`/blogs/`+$id, this.form)
                    .then(response => {
                        console.log(response.data)
                        this.form={}
                        this.$emit('getBlogEvent')
                        this.fetchBlogs()


                    }).catch(e => {
                    //this.errors.push(e)
                    console.log(e)
                })

            }
        },
        created() {
            this.fetchBlogs();
        }
    }
</script>

<style scoped>

</style>
