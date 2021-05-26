<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example component.
                        {{ one }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data()
         {
             return {
            one : 'test',
            two : 'test 2'
             }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
