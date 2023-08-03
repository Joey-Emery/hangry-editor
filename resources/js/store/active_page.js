export default {
    state: {
        active_page: null,
    },

    mutations: {
        setActivePage(state, page) {
            state.active_page = page;
        },

        updatePageComponents(state, page) {
            if(state.active_page && state.active_page.id == page.id) {
                state.active_page.components = null;

                setTimeout(function() {
                    state.active_page.components = page.components;
                }, 1);
            }
        }
    },
};