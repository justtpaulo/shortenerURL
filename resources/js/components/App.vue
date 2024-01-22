<template>
    <div>
        <TopMenu/>

        <div class="min-h-screen flex items-center justify-center">
            <div class="w-full md:w-2/3 lg:w-1/2 xl:w-1/3 mx-4 bg-white p-8 rounded-md shadow-md space-y-4">
                <form @submit.prevent="submitForm">
                    <label for="inputText" class="block text-gray-700 text-sm font-bold mb-2">Cole uma URL longa:</label>
                    
                    <div class="relative">
                        <input v-model="textInput" id="inputText" type="text" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-500" required/>
                    </div>
            
                    <button type="submit" class="w-full mt-4 bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-700" :disabled="loading">{{ loading ? "Enviando..." : "Enviar" }}</button>
                </form>
        
                <div v-if="errorMessage" class="bg-red-100 p-4 rounded-md text-red-700">{{ errorMessage }}</div>
        
                <div v-if="showSuccess" class="bg-green-100 p-4 rounded-md">
                    <p class="mb-2">Encurtagem bem-sucedida, confira o link:</p>
                    <a :href="successLink" target="_blank" class="text-blue-500">{{ successLink }}</a>
                </div>
        
                <div v-if="loading" class="text-gray-600">Aguarde, processando a solicitação...</div>
        
                <HistorySection :history="history"/>
            </div>
        </div>
    </div>
</template>
  
<script setup>
    import { ref } from "vue";
    import axios from "axios";
    import TopMenu from "./TopMenu.vue";
    import HistorySection from "./HistorySection.vue";

    const textInput = ref("");
    const showSuccess = ref(false);
    const successLink = ref("");
    const errorMessage = ref("");
    const loading = ref(false);
    const history = ref(loadHistory());

    const clearMessages = () => {
        errorMessage.value = "";
        showSuccess.value = false;
        successLink.value = "";
    };

    const submitForm = async () => {
        loading.value = true;

        try {
            clearMessages();

            const response = await axios.post("http://localhost:8000/api/shorten", { url: textInput.value });
            
            showSuccess.value = true;
            successLink.value = response.data.code;

            const newItem = {
                id: Date.now(),
                original: textInput.value,
                shortened: response.data.code
            };
            
            history.value = [newItem, ...history.value];
            saveHistory(history.value);
        } catch (error) {
            clearMessages();
            errorMessage.value = error.response?.data?.error?.url[0] || "Erro ao processar a solicitação.";
        } finally {
            loading.value = false;
        }
    };

    function loadHistory() {
        const savedHistory = localStorage.getItem("urlShortenerHistory");
        return savedHistory ? JSON.parse(savedHistory) : [];
    }

    function saveHistory(history) {
        localStorage.setItem("urlShortenerHistory", JSON.stringify(history));
    }
</script>