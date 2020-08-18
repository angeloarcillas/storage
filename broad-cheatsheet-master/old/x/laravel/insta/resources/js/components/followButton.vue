

<template>
<div class="container">
    <button class="btn btn-primary btn-sm" @click="followUser" v-text="buttonText"></button>
</div>
</template>

<script>
export default {
      // vue props
    props: ['userId', 'follows'],

    mounted() {
        console.log('Component mounted.');
    },
    data: function() {
        return {
            status: this.follows, // true/false
        }
    },

    methods: {
        followUser() {
            axios.post('/follow/' + this.userId)
                  // success
                .then(response => {
                    this.status = !this.status; // true/false
                    console.log(response.data);

                })
                  // error
                .catch(errors => {
                    console.log(errors);
                    if (errors.response.status == 401) {
                        window.location = "/login";
                    }
                });
        }
    },
    computed: {
        buttonText() {
            return (this.status) ? 'Unfollow' : 'Follow';
        }
    }
}
</script>
