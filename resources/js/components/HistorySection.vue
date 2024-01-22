<template>
    <div v-if="history.length > 0" class="mt-8">
        <h2 class="text-xl font-bold mb-2">Histórico:</h2>
        <ul class="divide-y divide-gray-300">
            <li v-for="item in history" :key="item.id" class="py-2">
                <div class="flex justify-between items-center">
                    <span class="text-gray-700 truncate w-3/5">{{ item.original }}</span>
                    <a :href="item.shortened" class="text-green-500 ml-4" target="_blank">{{ item.shortened }}</a>
                </div>
            </li>
        </ul>
    </div>
</template>
  
<script>
    export default {
        props: {
            history: Array,
        },
    };
</script>  