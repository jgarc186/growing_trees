<template>
    <main role="main" class="container">
        <div class="row">
            <div class="col-md-8 blog-main">

                <h3 class="pb-4 mb-4 font-italic border-bottom">
                    {{ headline }}
                </h3>

                <div class="blog-post" v-for="category in categories">
                    <a :href="'/categories/' + category.id">
                        <h2 class="blog-post-title" >{{ category.title }}</h2>
                    </a>
                    <form @submit.prevent="onSubmit(category.id)">
                        <button type="submit">Delete</button>
                    </form>
                </div>

            </div><!-- /.blog-main -->

            <sidebar-component></sidebar-component>

        </div><!-- /.row -->

    </main><!-- /.container -->
</template>

<script>
    import Category from "../models/Category";

    export default {
        props: ['headline'],

        created() {
            Category.all(categories => this.categories = categories);
        },

        methods: {
            onSubmit(id) {
                Category.delete(id);

                alert('Hooray, you just deleted a Category!');
            }
        },

        data() {
            return {
                body: this.headline,
                categories: []
            }
        }
    }
</script>
