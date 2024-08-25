<template>
  <Filters :filters="filters"/>
  <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-3">
    <Box v-for="listing in listings.data" :key="listing.id">
      <div>
        <Link :href="route('listing.show', {listing: listing.id})">
          <OfficeName :listing="listing" class="text-2xl font-bold" />
          <Price :price="listing.price" class="text-xl font-bold" />
          <ListingSpace :listing="listing" class="text-lg" />
          <ListingAddress :listing="listing" class="text-gray-500"/>
        </Link>
      </div>
      <div>
        <Link :href="route('listing.edit', {listing: listing.id})">Edit</Link>
      </div>
      <div>
        <Link :href="route('listing.destroy', {listing: listing.id})" method="DELETE" as="button">Delete</Link>
      </div>
    </Box>

  </div>
  <div v-if="listings.data.length" class="w-full flex justify-center my-8">
    <Pagination :links="listings.links" />
  </div>
</template>

<script setup>
import ListingAddress from '@/Components/ListingAddress.vue';
import {Link} from '@inertiajs/vue3'
import Box from '@/Components/UI/Box.vue'
import ListingSpace from '@/Components/ListingSpace.vue';
import Price from '@/Components/Price.vue';
import OfficeName from '@/Components/OfficeName.vue';
import Pagination from '@/Components/UI/Pagination.vue';
import Filters from '@/Pages/Listing/Index/components/Filters.vue'

defineProps({
    listings: Object,
    filters: Object,
})
</script>