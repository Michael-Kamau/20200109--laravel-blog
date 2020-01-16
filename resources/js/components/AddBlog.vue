<template>
<div>
    <div class="myForm">
        <form enctype="multipart/form-data">
            <div class="row">
                <div class="col-25">
                    <label for="blog_title">Blog Title</label>
                </div>
                <div class="col-75">
                    <input type="text" id="blog_title" name="blog_title"  v-model="form.title">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="blog_content">Blog Content</label>
                </div>
                <div class="col-75">
                    <input type="text" id="blog_content" name="blog_content"  v-model="form.content">
                </div>
            </div>
            <div class="row">
                <input type="button" value="Add Show" @click="postShow">
            </div>
        </form>

    </div>
</div>
</template>

<script>
    export default {
        name: "AddBlog.vue",
        data(){
            return{
                form:{}
            }
        }
    }
</script>

<style scoped>

</style>
