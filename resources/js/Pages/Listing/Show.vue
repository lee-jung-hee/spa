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
                02)-1234-3456
            </Box>
            <Box>
                <template #header>
                    할인율 계산기
                </template>
                <div>
                    <label class="label">계약기간 ({{ term }}개월)</label>
                    <input
                        v-model.number="term"
                        type="range" min="1" max="12" step="1"
                        class="w-full h-4 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700"
                    />
                    <label class="label">보증금 ({{ deposit }}만원)</label>
                    <input
                        v-model.number="deposit"
                        type="range" min="100" max="5000" step="100"
                        class="w-full h-4 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700"
                    />
                    <div>
                        <div class="text-gray-600 dark:text-gray-300 mt-2">
                            <div class="text-gray-500 font-medium mb-1">할인 후 금액</div>
                            <div>
                                <Price :price="discountRate" class="text3xl"></Price>
                                <span class="text-green-500"> ({{ discountPercentage }}% 할인)</span>
                            </div>
                        </div>
                    </div>
                </div>
            </Box>
            <Box>
                <template #header>
                    편의시설
                </template>
                <div class="grid grid-cols-4 sm:grid-cols-5 md:grid-cols-6 lg:grid-cols-7 xl:grid-cols-8 gap-4 text-xs text-center font-semibold">
                    <div v-for="amenity in listing.amenities" :key="amenity" class="flex flex-col items-center">
                        <img :src="amenityIcons[amenity]" class="max-w-10 dark:invert">
                        {{ amenity }}
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

import { ref, computed } from 'vue'
import { useDiscountRate } from '@/Composables/useDiscountRate'

const term = ref(2)
const deposit = ref(100)

const props = defineProps({
        listing: Object,
    })

const { discountRate } = useDiscountRate(props.listing.price, term, deposit)

const discountPercentage = computed(() => {
    const originalPrice = props.listing.price
    const discountedPrice = discountRate.value
    const discount = ((originalPrice - discountedPrice) / originalPrice) * 100
    return discount.toFixed(0) // 소수점 둘째 자리까지 표시
})

// Define icons for each amenity
const amenityIcons = {
    '회의실': 'https://cdn-icons-png.flaticon.com/512/1429/1429487.png',
    'WiFi': 'https://cdn-icons-png.flaticon.com/512/1/1848.png',
    '주차가능': 'https://cdn-icons-png.flaticon.com/512/75/75905.png',
    '프린터': 'https://cdn-icons-png.flaticon.com/512/446/446991.png',
    '스튜디오': 'https://cdn-icons-png.flaticon.com/512/6317/6317777.png',
    '택배계약': 'https://cdn-icons-png.flaticon.com/512/1585/1585176.png',
    '24시간': 'https://cdn-icons-png.flaticon.com/512/654/654994.png',
    '도어락': 'https://cdn-icons-png.flaticon.com/512/15957/15957646.png',
    'CCTV': 'https://cdn-icons-png.flaticon.com/512/1111/1111703.png',
    '보안업체': 'https://cdn-icons-png.flaticon.com/512/1022/1022382.png',
    '청소': 'https://cdn-icons-png.flaticon.com/512/2829/2829961.png',
    '무료음료': 'https://cdn-icons-png.flaticon.com/512/1384/1384618.png',
    '무료다과': 'https://cdn-icons-png.flaticon.com/512/2553/2553651.png',
    '무료커피': 'https://cdn-icons-png.flaticon.com/512/818/818217.png',
    '주말운영': 'https://cdn-icons-png.flaticon.com/512/6520/6520529.png',
    '교통약자': 'https://cdn-icons-png.flaticon.com/512/414/414272.png',
}
</script>
