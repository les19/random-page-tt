<template>
    <div class="home">
        <div class="home-item">
            <CustomerCard />
        </div>

        <div class="home-item">
            <CreateCustomer v-if="customer.loaded && !customer.logged" @create-customer="createCustomer" />
        </div>

        <div class="home-item">
            <LinkList v-if="customer.loaded && customer.logged" />
        </div>

    </div>
</template>

<script>

import { mapState, mapActions } from "vuex";
import CreateCustomer from "./home/CreateCustomer.vue";
import CustomerCard from "../CustomerCard.vue";
import LinkList from "./home/LinkList.vue";

export default {
    name: 'Home',
    components: {
        CreateCustomer,
        CustomerCard,
        LinkList,
    },


    computed: {
        ...mapState(['customer'])
    },

    methods: {
        ...mapActions({
            create: 'customer/create',
        }),

        createCustomer({ name, phone }) {
            this.create({
                name,
                phone
            });
        },
    }

}

</script>