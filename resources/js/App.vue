<template>
		<div class="row justify-content-center">
			<div class="col-sm-4 mt-5">
				<form @submit.prevent="login" v-if="isAuthenticated == false">
				<h1 class="page-title text-center pb-4">ACCEDI</h1>
					<div class="form-group">
						<label for="username">Username</label>
						<input type="text" class="form-control" v-model="form.username"/>
					</div>			
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" v-model="form.password"/>
					</div>			
					<div v-show="errorAlert != null" class="mb-2 error-message">
						{{ errorAlert.message }}
					</div>
					<div class="d-flex justify-content-center flex-column">
						<button type="submit" class="btn btn-dark mt-2 mb-2">Login</button>
						<a href="/register" class="btn btn-warning ">Crea un account</a>
					</div>
				</form>

				<div v-else class="d-flex justify-content-center flex-column">
					<h2>Benvenuto, {{ authUser.name }}!</h2>
					<button type="button" class="btn btn-dark mt-4" @click="logout">Logout</button>
				</div>
			</div>
		</div>
</template>

<script>
	import { reactive, inject,ref, onMounted } from 'vue';
	import axios from 'axios';
	export default{
		setup(){
			let cookies = inject('cookies')
			let isAuthenticated = ref(false)
			let authUser = reactive({ name: null });
			let errorAlert = reactive({ message: null });
			const form = reactive({
				username:'',
				password:''
			});

			const login = async()=>{
				try {
					let res = await axios.post('api/login',form)
					if(res.data.access_token){
						cookies.set('access_token',res.data.access_token)
						isAuthenticated.value = true;
						cookies.set('user', res.data.user.username)
						getUser(res.data.user.username);
					}
				} catch (error) {
					errorAlert.message = 'I dati inseriti non sono corretti.'
				}
			}

			const checkLogin = ()=>{
				if(cookies.get('access_token')){
					getUser(cookies.get('user'));
					isAuthenticated.value = true;
				}
			}

			const logout = () =>{
				if(cookies.get('access_token')){
					cookies.set('access_token','')
					isAuthenticated.value = false;
				}
			}

			const getUser = (data) =>{
				authUser.name = data;
			}

			onMounted(checkLogin)

			return {
				form,
				login,
				isAuthenticated,
				logout,
				authUser,
				errorAlert
			}
		},
	}
</script>