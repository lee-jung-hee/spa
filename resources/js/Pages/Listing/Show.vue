<template>
    <div class="flex flex-col-reverse md:grid md:grid-cols-12 gap-4">
        <Box class="md:col-span-7 flex items-center w-full">
            <div class="relative w-full" style="padding-top: 100%;">
                <img src="http://127.0.0.1:8000/storage/office04.jpg" class="absolute top-0 left-0 w-full h-full object-cover">
            </div>
        </Box>
        <div class="md:col-span-5 flex flex-col gap-4">
            <Box>
                <template #header>
                    오피스명
                </template>
                <OfficeName :listing="listing" class="text-2xl font-bold" />
            </Box>
            <Box>
                <template #header>
                    기본정보
                </template>
                <Price :price="listing.price" class="text-2xl font-bold" />
                <ListingSpace :listing="listing" class="text-lg" />
                <ListingAddress :listing="listing" class="text-gray-500"/>
            </Box>
            <Box>
                <template #header>
                    문의
                 </template>
                문의하기
            </Box>
            <Box>
                <template #header>
                    할인율 계산기
                </template>
                <div>
                    <label class="label">계약기간 (3개월)</label>
                    <input type="range" min="1" max="60" step="1"
                    class="w-full h-4 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700"
                    />
                    <label class="label">할인율 (5%)</label>
                    <input type="range" min="3" max="50" step="1"
                    class="w-full h-4 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700"
                    />

                    <div class="text-gray-600 dark:text-gray-300 mt-2">
                        <div class="text-gray-400">할인 후 금액</div>
                        <Price :price="500000" class="text3xl"></Price>
                    </div>
                </div>
            </Box>
        </div>
    </div>
</template>

<script setup>
import ListingAddress from '@/Components/ListingAddress.vue';
import ListingSpace from '@/Components/ListingSpace.vue';
import Price from '@/Components/Price.vue';
import Box from '@/Components/UI/Box.vue'
import OfficeName from '@/Components/OfficeName.vue'
    defineProps({
        listing: Object,
    })
</script>