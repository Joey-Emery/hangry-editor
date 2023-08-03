import { createApp } from 'vue';
import router from './router';
import store from './store';
import axios from 'axios';
window.$ = require('jquery');

const app = createApp({
	data() {
		return {
			activePage: null,
			activeTool: 'pointer',
		}
	},

	mounted()
	{
		$('body').on('click', function(e) {
			if($(e.target).hasClass('page-dropdown-toggle')) return;
			
			if($('.page-dropdown').hasClass('open')) {
				$('.page-dropdown').removeClass('open');
			}
		});
	},

	methods: {
		updateActiveTool(tool)
		{
			this.activeTool = tool;

			if(this.activeTool == 'move') {
				$('.page-renderer').sortable('enable');
			} else {
				$('.page-renderer').sortable('disable');
			}
		},

		reloadActivePage(page_id, null_component) {
			axios.get(`/api/pages/${page_id}`)
				.then(response => {
					this.$store.commit('setActivePage', response.data);

					if(null_component) this.$store.commit('setActiveComponent', null);
				});
		},

		reloadPageComponents(page_id) {
			axios.get(`/api/pages/${page_id}`)
				.then(response => {
					this.$store.commit('updatePageComponents', response.data);
				});
		}
	},
});

app.use(router);
app.use(store);

app.mount('#vue-app');