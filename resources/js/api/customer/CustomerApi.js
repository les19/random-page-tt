import BaseApi from "../BaseApi";

class CustomerApi extends BaseApi {

    current(){
        return window.axios.get('/customer/current');
    }

    create(data){
        return window.axios.post('/customer/create', data);
    }

    logout(){
        return window.axios.post('/customer/logout');
    }

}

export default CustomerApi;