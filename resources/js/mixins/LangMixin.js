import Lang from '../lib/Lang';

export default {
    methods: {
        trans(string){
            return Lang[string];
        }
    }
}