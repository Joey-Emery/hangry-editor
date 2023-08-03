<template>
	<div class="jumbotron" :style="'margin: ' + contents.margin + '; padding: ' + contents.padding + ';'">
	  	<h1>{{ contents.title }}</h1>
	  	<p>{{ contents.text }}</p>
	  	<p><a class="btn btn-primary block-renderer" href="#" role="button">{{ contents.button }}</a></p>
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