<template>
    <main role="main" class="container">
        <div class="row">
            <div class="col-md-8 blog-main">
                <h3 class="pb-4 mb-4 font-italic border-bottom">
                    {{ headline }}
                </h3>
                <div class="blog-post">
                    <div>
                        <form @submit.prevent="onSubmit" @keydown="form.errors.clear()">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control" v-model="form.title">
                                <span v-if="form.errors.has('title')" v-text="form.errors.get('title')"></span>
                            </div>
                            <div class="form-group">
                                <label>headline</label>
                                <input type="text" name="headline" class="form-control" v-model="form.headline">
                                <span v-if="form.errors.has('headline')" v-text="form.errors.get('headline')"></span>
                            </div>
                            <div class="form-group">
                                <label>description</label>
                                <textarea class="form-control" name="description" rows="3" v-model="form.description"></textarea>
                                <span v-if="form.errors.has('description')" v-text="form.errors.get('description')"></span>
                            </div>
                            <button type="submit" class="btn btn-primary" :disabled="form.errors.any()">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <sidebar-component></sidebar-component>
        </div>
    </main><!-- /.container -->
</template>

<script>
    export default {
        props: [
            'headline'
        ],

        methods: {
            onSubmit() {
                this.form
                    .post('/categories')
                    .then(status => this.$emit('completed', status));

                    alert('Hooray, you just created a NEW Category!');
            }
        },

        data() {
            return {
                body: this.headline,
                form: new Form({
                    title: '',
                    headline: '',
                    description: ''
                }),
                statuses: []
            }
        }
    }
</script>
