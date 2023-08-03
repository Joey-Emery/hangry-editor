<script setup>
	import Swal from 'sweetalert2';
</script>

<template>
	<form class="login" @submit.prevent="login" :style="'margin: ' + contents.margin + '; padding: ' + contents.padding + ';'">
		<div class="form-group">
			<label>{{ contents.username_field }}</label>
			<input type="text" class="form-control" :placeholder="contents.username_field" v-model="model.username" />
		</div>
		<div class="form-group">
			<label>{{ contents.password_field }}</label>
			<input type="password" class="form-control" :placeholder="contents.password_field" v-model="model.password" />
		</div>

		<input type="submit" class="btn btn-primary pull-right" value="Log in">
	</form>
</template>

<script>
	export default {
		data() {
			return {
				model: {
					username: null,
					password: null,
				}
			}
		},

		props: {
			contents: {
				required: true,
			}
		},

		methods: {
			login()
			{
				Swal.fire({
					title: "Login attempt",
					html: `Attempting to log in with the credentials:<br /><br /> ${this.model.username} - ${this.model.password}`,
					icon: 'info',
					heightAuto: false,
				});

				this.model.username = null;
				this.model.password = null;
			}
		}
	}
</script>