<template>
	<div class="header-bar" :style="'background: ' + contents.background_colour + '; margin: ' + contents.margin + '; padding: ' + contents.padding + ';'">
		<h1>{{ contents.title }}</h1>
		<a href="#" v-if="contents.link_icon != null"><span :class="contents.link_icon"></span></a>
	</div>
</template>

<script>
	export default {
		props: {
			contents: {
				required: true,
			}
		}
	}
</script>