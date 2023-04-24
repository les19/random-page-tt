import { createStore } from 'vuex'
import customer from './modules/customer'
import links from './modules/links'
import link from './modules/link'

export default createStore({
    modules: {
        customer,
        links,
        link,
    },
})