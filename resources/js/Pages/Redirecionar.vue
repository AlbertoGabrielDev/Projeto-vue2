<template>
    <div class="container mx-auto">
        <h1 class="text-2x1 font-bold mb-4">Cadastro</h1>
        <form @submit.prevent="submitForm">
            <div class="mb-4">
                <label class="block mb-2" for="name">Nome:</label>
                <input v-model="form.name" type="text" id="name" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label for="email">Email:</label>
                <input type="email" v-model="form.email" id="email" name="email" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label class="block mb-2" for="password">Senha:</label>
                <input v-model="form.password" type="password" id="password" name="password"
                    class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label class="block mb-2" for="password_confirmation">Confirmar Senha:</label>
                <input v-model="form.password_confirmation" type="password" id="password_confirmation"
                    name="password_confirmation" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label class="block mb-2" for="cpf">Telefone:</label>
                <input v-model="form.phone" type="text" id="cpf" name="cpf" class="w-full p-2 border rounded" required>
            </div>
            <div>
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Cadastrar</button>
            </div>
        </form>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data(){
        return{
            form:{
                name: '',
                email: '',
                password: '',
                password_confirmation: '',
                phone: ''
            }
        };
    },
    methods:{
        submitForm(){
            axios.post('/registro',this.form)
                .then(response=>{console.log(response.data);
                }).catch(error => {
        if (error.response && error.response.data && error.response.data.errors) {
            console.log(error.response.data.errors);
        } else {
            console.error(error);
        }
                });
        }
    }

}
</script>