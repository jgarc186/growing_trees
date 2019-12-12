<template>
    <div>
        Create
        <li v-for="link in links"><a :href="link.url">{{link.text}}</a></li>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                links: [
                    {
                        text: 'category',
                        url: '/categories/create'
                    },
                    {
                        text: 'Sub-Category',
                        url: '/subcategories/create'
                    },
                    {
                        text: 'Articles',
                        url: '/articles/create'
                    }
                ]
            }
        }
    }
</script>
