import { createStore } from 'vuex';
import axios from 'axios';
import createPersistedState from 'vuex-persistedstate';

export default createStore({
    state: {
        user: {}
    },
    mutations: {
        setUserCommit: (state, value) => {
            state.user = value;
        }
    },
    actions: {
        userStateAction({ commit }) { 
            axios.get('api/user/me')
                .then(response => {
                    const userResponse = response.data.user;
                    commit('setUserCommit', userResponse);
                })
                .catch(error => {
                    console.error('Erro ao buscar usuário:', error);
                });
        }
    },
    plugins: [createPersistedState()]
});

