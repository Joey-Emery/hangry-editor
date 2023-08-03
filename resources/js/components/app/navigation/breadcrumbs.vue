<template>
	<div class="breadcrumb-wrapper" :style="'margin: ' + contents.margin + '; padding: ' + contents.padding + ';'">
		<ol class="breadcrumb">
	  		<li><a href="#" class="block-renderer">Home</a></li>
	  		<li><a href="#" class="block-renderer">Library</a></li>
	  		<li class="active">Data</li>
		</ol>
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