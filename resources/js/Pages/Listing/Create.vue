<template>
  <form @submit.prevent="create">
      <div class="grid grid-cols-6 gap-4">
        <div class="col-span-6">
          <label class="label">오피스명</label>
          <input v-model.number="form.office_name" type="text" class="input"/>
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
          <label>주소</label>
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
  
        <div>
          <button type="submit" class="btn-primary">만들기</button>
        </div>
      </div>
    </form>
  </template>

  <script setup>
    import { useForm } from '@inertiajs/vue3'

    const form = useForm({
      office_name: null,
      beds: 0,
      baths: 0,
      area: 0,
      city: null,
      street: null,
      code: null,
      street_nr: null,
      price: 0,
    })
    const create = () => form.post(route('listing.store'))
  </script>
  
  <style scoped>
  label {
    margin-right: 2em;
  }
  
  div {
    padding: 2px
  }
  </style>