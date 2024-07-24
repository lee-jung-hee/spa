<template>
  <form @submit.prevent="create">
      <div class="grid grid-cols-6 gap-4">
        <div class="col-span-6">
          <label class="label">오피스명</label>
          <input v-model="form.office_name" type="text" class="input"/>
          <div v-if="form.errors.office_name" class="input-error">
          {{ form.errors.office_name }}</div>
        </div>

        <div class="col-span-2">
          <label class="label">몇 인실</label>
          <input v-model.number="form.beds" type="text" class="input"/>
          <div v-if="form.errors.beds" class="input-error">
          {{ form.errors.beds }}</div>
        </div>
  
        <div class="col-span-2">
          <label class="label">주차 가능 대수</label>
          <input v-model.number="form.baths" type="text" class="input"/>
          <div v-if="form.errors.baths" class="input-error">
          {{ form.errors.baths }}</div>
        </div>
  
        <div class="col-span-2">
          <label class="label">면적</label>
          <input v-model.number="form.area" type="text" class="input"/>
          <div v-if="form.errors.area" class="input-error">
          {{ form.errors.area }}</div>
        </div>
  
        <div class="col-span-4">
          <label class="label">주소</label>
          <input v-model="form.city" type="text" class="input"/>
          <div v-if="form.errors.city" class="input-error">
          {{ form.errors.city }}</div>
        </div>
  
        <div class="col-span-2">
          <label class="label">우편번호</label>
          <input v-model="form.code" type="text" class="input"/>
          <div v-if="form.errors.code" class="input-error">
          {{ form.errors.code }}</div>
        </div>
  
        <div class="col-span-4">
          <label class="label">도로명</label>
          <input v-model="form.street" type="text" class="input"/>
          <div v-if="form.errors.street" class="input-error">
          {{ form.errors.street }}</div>
        </div>
  
        <div class="col-span-2">
          <label class="label">도로번호</label>
          <input v-model.number="form.street_nr" type="text" class="input"/>
          <div v-if="form.errors.street_nr" class="input-error">
          {{ form.errors.street_nr }}</div>
        </div>
  
        <div class="col-span-6">
          <label class="label">월 임대료</label>
          <input v-model.number="form.price" type="text" class="input"/>
          <div v-if="form.errors.price" class="input-error">
          {{ form.errors.price }}</div>
        </div>

        <div class="col-span-6">
          <label class="label">편의시설</label>
          <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-2">
            <label v-for="(amenity, index) in availableAmenities" :key="index" class="flex items-center cursor-pointer">
              <input type="checkbox" :value="amenity" v-model="form.amenities" class="mr-2">
              <span>{{ amenity }}</span>
            </label>
          </div>
          <div v-if="form.errors.amenities" class="input-error">
          {{ form.errors.amenities }}</div>
        </div>
  
        <div>
          <button type="submit" class="btn-primary">만들기</button>
        </div>
      </div>
    </form>
  </template>

<script setup>
import { useForm } from '@inertiajs/vue3'
import { ref } from 'vue'

const props = defineProps({
  availableAmenities: Array,
})

const form = useForm({
  office_name: '',
  amenities: [],
  beds: 0,
  baths: 0,
  area: 0,
  city: '',
  street: '',
  code: '',
  street_nr: '',
  price: 0,
})

const create = () => form.post(route('listing.store'))
</script>
