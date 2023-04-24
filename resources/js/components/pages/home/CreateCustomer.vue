<template>
    <form @submit.prevent="submitForm">

        <div class="mb-3">
            <label class="form-label" for="name"> {{ trans('User name') }} </label>
            <input class="form-control" name="name" id="name" required="required" v-model="name" type="text">
        </div>

        <div class="mb-3">
            <label class="form-label" for="phone"> {{ trans('Phone number') }} </label>
            <input ref="phone" class="form-control" name="phone" id="phone" required="required" v-model="phone" type="text">
        </div>

        <button type="submit" class="btn btn-primary">{{ trans('Register') }}</button>

    </form>
</template>

<script>

import Inputmask from "inputmask";

export default {
    name: "CreateCustomer",

    data() {
        return {
            phone: '',

            name: ''
        }
    },

    mounted(){
        this.mask();
    },

    methods: {
        submitForm() {
            this.$emit('createCustomer', {
                name: this.name,
                phone: this.phone.replace('-', ''),
            })
        },

        mask(){
            let im = new Inputmask('999-999-9999');
            im.mask(this.$refs.phone);
        }
    }
}

</script>