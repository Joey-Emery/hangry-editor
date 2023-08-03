import axios from 'axios';

export default {
    state: {
        projects: null,
        project: null,
    },

    mutations: {
        setProjects(state, projects) {
            state.projects = projects;
        },

        setProject(state, project) {
            state.project = project;
        },
    },

    actions: {
        getProjects(context, data) {
            axios.get(`/api/projects`)
                .then(response => {
                    context.commit('setProjects', response);
                })
                .catch(error => {
                    context.commit('setProjects', error);
                });
        },

        getProject(context, data) {
            axios.get(`/api/projects/${data.id}`)
                .then(response => {
                    context.commit('setProject', response);
                })
                .catch(error => {
                    context.commit('setProject', error);
                });
        },
    },
};