<template>
    
</template>

<script>
    export default {
        name: 'CreateComponent',
        data: function() {
            return {
                comment: null,
            }
        }
        methods: {
            getComments() {
                axios.get('/api/comments')
                .then(res => {
                    this.comment = res.data
                })
            }
        },
        mounted() {
            this.getComments()
        }
    }
</script>
