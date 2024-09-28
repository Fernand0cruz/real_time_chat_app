<script setup>
import { ref, onMounted } from 'vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import axios from 'axios';

const users = ref([]);
const messages = ref([]);

onMounted(() => {
    // const token = localStorage.getItem('token');

    axios.get('/api/users', {
        // headers: {
        //     'Authorization': `Bearer ${token}`
        // }
    })
    .then(response => {
        users.value = response.data.users
    })
    .catch(error => {
        console.error('Erro ao buscar usuários:', error);
    });
});

const loadMessages = (userId) => {
    axios.get(`/api/messages/${userId}`)
    .then(response => {
        messages.value = response.data.messages
    })
    .catch(error => {
        console.error('Erro ao buscar mensagens do usuário:', error);
    });
}

</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Chat
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex w-full bg-white overflow-hidden shadow-xl sm:rounded-lg" style="min-height: 500px; max-height: 500px; width: 100%;">
                    <div class="w-3/12 bg-gray-200 bg-opacity-25 border-r border-gray-200 overflow-y-scroll">
                        <ul>
                            <li 
                                v-for="user in users" :key="user.id"
                                @click="() => {loadMessages(user.id)}"
                                class="p-6 text-lg text-gray-600 leading-7 font-semibold border-b border-gray-200 hover:bg-opacity-50 hover:bg-gray-200 hover:cursor-pointer">
                                <p class="flex items-center justify-between">
                                    {{ user.name }}
                                    <span class="ml-2 w-2 h-2 bg-blue-400 rounded-full"></span>
                                </p>
                            </li>
                        </ul>
                    </div>
                    <div class="w-9/12 flex flex-col justify-between">
                        <div class="w-full h-full p-6 flex flex-col overflow-y-scroll">
                            <div
                                v-for="message in messages" :key="message.id" 
                                :class="(message.from === $attrs.auth.user.id ? 'text-right' : '')"
                                class="w-full mb-3">
                                <p 
                                    :class="(message.from === $attrs.auth.user.id ? 'messageFromMe' : '')"
                                    class="inline-block p-2 rounded-md bg-gray-200 max-w-[75%]">
                                    {{ message.content }}
                                </p>
                                <span class="block mt-1 text-xs text-gray-500">{{ $formatDate(message.created_at) }}</span>
                            </div>
                        </div>

                        <div class="w-full bg-gray-200 bg-opacity-25 p-6">
                            <form >
                                <div class="flex">
                                    <input type="text" class="flex-1 px-4 py-2 text-sm focus:outline-none" autocomplete="off"/>
                                    <button type="submit" class=" bg-indigo-500 hover:bg-indigo-600 text-white px-4 py-2">
                                        Enviar
                                    </button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<style scoped>
.messageFromMe {
    @apply bg-indigo-300 bg-opacity-25;
}
.messageToMe {
    @apply bg-gray-300 bg-opacity-25;
}
</style>