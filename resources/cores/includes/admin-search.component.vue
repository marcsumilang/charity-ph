<template>

            <form class="vue-search pull-right">
               
                <button  v-on:click="search()" type="button" class="btn"><i class="fa fa-search"></i></button>
                <input type="text" v-model="data.keyword" class="form-control" placeholder="Search..">

            </form>


</template>

<script>
    export default {
        data : function(){
            return {
                data : {},
            }
        },
        methods : {
            search: function () {
                this.$emit('click-handler',this.data);
            }
        }
    }
</script>

<style scoped lang="scss">

    .vue-search {
        max-width: 400px;
        input[type=text] {
            border-radius: 0px;
            float: right;
            width: 80%;
            min-height: 42px !important;
        }
        button {
            border-radius: 0 !important;
            float: right;
            width: 20%;
            padding: 7px 19px !important;
            /*font-size: 19px;*/
            /*transition: all 0.2s ease;*/
            /*border-radius: 0;*/
        }

    }


</style>