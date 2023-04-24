<template>

    <ul class="list-group shadow" v-if="links.items.length > 0">

        <li v-for="link in links.items" class="p-3 border border-end-0 border-start-0 border-top-0 list-group-item text-bg-light">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-3">
                        <router-link class="btn btn-primary" :to="`/link/${link.id}`" >
                            {{ trans('Go') }}
                        </router-link>
                    </div>
                    <div class="col">
                        <div class="text-end">  
                            <span class="text-muted">{{ trans('Link') }} ID</span>
                            <p class="m-0">
                                {{ link.id }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </li>

    </ul>

</template>

<script>
import { mapActions, mapState } from 'vuex';


export default {
    name: 'LinkList',

    computed: {
        ...mapState(['links'])
    },

    mounted(){
        this.index();
    },

    methods: {
        ...mapActions({
            index: 'links/index',
        }),
    },
}

</script>
