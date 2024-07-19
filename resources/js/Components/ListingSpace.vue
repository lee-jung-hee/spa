<template>
    <div>
        <span class="font-bold">{{ listing.beds }}</span>룸<span class="text-gray-400 px-1">|</span>
        <span class="font-bold">{{ listing.baths }}</span>화장실<span class="text-gray-400 px-1">|</span>
        <span class="font-bold">{{ listing.area }}</span>m²
    </div>
</template>

<script setup>
    const props = defineProps({
        listing: Object,
    });
</script>
