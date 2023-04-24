import BaseApi from "../BaseApi";

class LinkApi extends BaseApi {

    index(){
        return window.axios.get('/link/index');
    }

    addLink(){
        return window.axios.post('/link/create');
    }

    show(id){
        return window.axios.get(`/link/show/${id}`);
    }

    game(gameId){
        return window.axios.post(`/game/${gameId}/run`);
    }

    deactivate(id){
        return window.axios.post(`/link/${id}/deactivate`);
    }

    history(gameId){
        return window.axios.post(`/game/${gameId}/history`);
    }
}

export default LinkApi;