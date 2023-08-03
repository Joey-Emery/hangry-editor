import { createStore } from 'vuex'
import storeloader from './storeloader';
import _ from 'lodash';

const store = createStore(storeloader.import([
	'project',
	'component',
	'active_page',
	'active_component',
	'toast',
]));

export default store;