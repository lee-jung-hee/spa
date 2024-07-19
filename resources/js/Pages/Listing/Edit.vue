<template>
  <form @submit.prevent="update">
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
          <button type="submit" class="btn-primary">Edit</button>
        </div>
      </div>
    </form>
  </template>

  <script setup>
    import { useForm } from '@inertiajs/vue3'

    const props = defineProps({
      listing: Object,
    })
    const form = useForm({
      beds: props.listing.beds,
      baths: props.listing.baths,
      area: props.listing.area,
      city: props.listing.city,
      street: props.listing.street,
      code: props.listing.code,
      street_nr: props.listing.street_nr,
      price: props.listing.price,
      office_name: props.listing.office_name
    })

    const update = () => form.put(route('listing.update', {listing: props.listing.id}))
  </script>