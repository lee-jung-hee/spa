<template>
    <div>
        <span class="font-bold">{{ listing.beds }}</span>인실<span class="text-gray-400 px-1">|</span>
        <span class="font-bold">{{ listing.baths }}</span>대 주차 가능<span class="text-gray-400 px-1">|</span>
        <span class="font-bold">{{ listing.area }}</span>m²
    </div>
</template>

<script setup>
    const props = defineProps({
        listing: Object,
    });
</script>
