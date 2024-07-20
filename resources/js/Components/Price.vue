<template>
    <span>{{ formattedPrice }} 월</span>
  </template>
  
  <script setup>
  import { computed } from 'vue';
  
  const props = defineProps({
    price: [Number, String]
  });
  
  const formattedPrice = computed(() => {
    const priceNumber = Number(props.price);
    return priceNumber.toLocaleString('ko-KR', {
      style: 'currency',
      currency: 'KRW',
      maximumFractionDigits: 0
    });
  });
  </script>
  