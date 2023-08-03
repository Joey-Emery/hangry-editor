import axios from 'axios';

export default {
    state: {
        component_categories: null,
    },

    mutations: {
        setComponentCategories(state, component_categories) {
            state.component_categories = component_categories;
        },
    },

    actions: {
        getComponentCategories(context, data) {
            axios.get(`/api/categories`)
                .then(response => {
                    context.commit('setComponentCategories', response);
                })
                .catch(error => {
                    context.commit('setComponentCategories', error);
                });
        },
    },
};