<template>
    <div class="container">
        <div v-for="comments in comment">
            <span class="username">
              <p>  
                <b>

                {{comments.name}}
                </b>
              </p>
              <!-- <span class="text-muted float-right">{{$comment->getCarbonDate()->diffForHumans()}}</span> -->
            </span>
            <p>
                {{comments.message}}
            </p>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'ExampleComponent',
        data: function() {
            return {
                comment: null
            }
        },
        methods: {
            getComments() {
                axios.get('/api/comments')
                .then(res => {
                    this.comment = res.data
                    console.log(res)
                })
            }
        },
        mounted() {
            this.getComments()
        }
    }
</script>
