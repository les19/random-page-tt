<template>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-12">
                <router-view></router-view>
            </div>
        </div>
    </div>

</template>

<script>

import Home from './pages/Home.vue';
import '../../sass/style.scss';
import { mapActions, mapState } from 'vuex';

export default {
    name: 'App',
    components: {
        Home
    },

    created() {
        this.getCurrent();
    },

    watch: {
        success(value) {
            if(!value){
                this.$router.push("/");
            }
        }
    },

    computed:{
        ...mapState({
            success: state => state.customer.success
        })
    },  

    methods: {
        ...mapActions({
            getCurrent: 'customer/getCurrent',
        }),
    }

}


</script>