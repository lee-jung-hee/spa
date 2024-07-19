<template>
    <div>
        {{ listing.office_name }} 오피스
    </div>
</template>

<script setup>
    const props = defineProps({
        listing: Object,
    });
</script>
