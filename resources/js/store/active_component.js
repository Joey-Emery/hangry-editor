export default {
    state: {
        active_component: null,
    },

    mutations: {
        setActiveComponent(state, component) {
            state.active_component = component;
        },
    },
};