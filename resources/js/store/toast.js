import _ from 'lodash';

export default {
    state: {
        toasts: [],
        toast_id: 1,
    },

    mutations: {
        addToast(state, toast) {
            toast.id = state.toast_id++;
            state.toasts.push(toast);

            setTimeout(function() {
                var key = _.findKey(state.toasts, function(t) {
                    return (t.id == toast.id);
                });

                if(key) state.toasts.splice(key, 1);
            }, 2000);
        },

        removeToast(state, index) {
            state.toasts.splice(index, 1);
        }
    },
};