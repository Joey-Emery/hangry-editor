<script setup>
	import Header from '../components/Header.vue';
	import ToastTray from '../components/ToastTray.vue';
</script>

<template>
	<div class="layout layout-app">
		<Header />
		<router-view></router-view>
		<ToastTray />
	</div>
</template>

<script>
	export default {
		mounted()
		{
			
		},
	}
</script>