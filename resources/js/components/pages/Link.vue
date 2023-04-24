<template>
    <div class="link">
        <div class="link-item">
            <CustomerCard />
        </div>
        <div class="link-item">
            <GameItem
                v-if="link?.game"
                :game="link.game"
            />
        </div>
    </div>
</template>

<script>
import { mapActions, mapState } from 'vuex';
import CustomerCard from '../CustomerCard.vue';
import GameItem from './link/GameItem.vue';


export default {
    name: "Link",

    components: { CustomerCard, GameItem },

    mounted() {
        this.show(this.$route.params.id);
    },

    watch: {
        expired() {
            this.$router.push("/");
        }
    },

    computed: {
        ...mapState({
            expired: state => state.link.expired,
            link: state => state.link.item,
        })
    },
    methods: {
        ...mapActions({
            show: "link/show"
        })
    },
}

</script>