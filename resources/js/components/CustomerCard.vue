<template>
    <div v-if="customer.loaded && customer.logged" class="p-3 rounded shadow border border-light text-bg-light">
        <div class="container-fluid">
            <div class="row">
                <div class="col-3">
                    <div class="customer-button-list d-flex flex-column">
                        <button class="btn btn-warning" @click="logout">
                            {{ trans('Logout') }}
                        </button>
                        <button class="btn btn-success" @click="addLink">
                            {{ trans('Add link') }}
                        </button>
                    </div>
                </div>
                <div class="col">
                    <div class="text-end">
                        <small class="text-muted">
                            {{ customer.current.id }}
                        </small>
                        <p class="m-0">
                            {{ customer.current.name }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapActions, mapState } from 'vuex';


export default {
    name: 'CustomerCard',

    computed: {
        ...mapState({
            customer: 'customer'
        })
    },

    methods: {
        ...mapActions({
            logout: 'customer/logout',
            addLink: 'links/addLink',
        }),
    }
}

</script>