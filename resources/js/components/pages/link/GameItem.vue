<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5 col-12">
                <div class="d-flex justify-content-center">
                    <button @click="gameRun" class="btn btn-danger">
                        {{ game.name }}
                    </button>
                </div>
                <div v-if="result?.id" class="text-center">
                    <p> {{ trans('Win') }}: {{ result.is_win ? trans('Yes') : trans('No') }}</p>
                    <p> {{ trans('Value') }}: {{ result.value }}</p>
                    <p> {{ trans('Gain') }}:{{ result.gain }}</p>
                </div>
            </div>
            <div class="col-md-5 col-12">
                <div class="d-flex justify-content-center">
                    <button @click="getHistory" :disabled="!result?.id" class="btn btn-info">
                        {{ trans('History') }}
                    </button>
                </div>

                <div v-if="history.length > 0" class="list-group">
                    <div v-for="item in history" class="list-group-item">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-4"> {{ trans('Win') }}: {{ item.is_win ? trans('Yes') : trans('No') }}</div>
                                <div class="col-4"> {{ trans('Value') }}: {{ item.value }}</div>
                                <div class="col-4"> {{ trans('Gain') }}:{{ item.gain }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <div class="d-flex justify-content-center">
                    <button @click="deactivate" class="btn btn-info">
                        {{ trans('Deactivate') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapActions, mapState } from 'vuex';

export default {
    name: 'GameItem',

    props: {
        game: Object,
    },

    watch: {
        deactivated(value) {
            if (value) {
                this.$router.push("/");
            }
        }
    },

    computed: {
        ...mapState({
            result: state => state.link.result,
            history: state => state.link.history,
            deactivated: state => state.link.deactivated,
        }),
    },

    methods: {
        ...mapActions({
            gameRun: 'link/game',
            getHistory: 'link/getHistory',
            deactivate: 'link/deactivate',
        })
    }
}

</script>