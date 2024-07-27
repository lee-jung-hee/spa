<template>
    <header class="border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 w-full">
      <div class="container mx-auto">
        <nav class="p-4 flex items-center justify-between">
          <div class="text-lg font-medium">
            <Link :href="route('listing.index')">목록</Link>
          </div>
          <div class="text-xl text-indigo-600 dark:text-indigo-600 font-bold">
            <Link :href="route('listing.index')">오피스맵</Link>&nbsp;
          </div>
          <div v-if="user" class="flex items-center gap-4">
            <div class="text-gray-500 dark:text-gray-50">{{ user.name }}</div>
            <Link :href="route('listing.create')" class="btn-primary">+ 매물등록</Link>
            <div>
              <Link :href="route('logout')" method="delete" as="button">Logout</Link>
            </div>
          </div>
          <div v-else>
            <Link :href="route('login')">Sign-in</Link>
          </div>
        </nav>
      </div>
    </header>
    <main class="container mx-auto p-4">
      <div v-if="flashSuccess" class="mb-4 border rounded-md shadow-sm border-green-200 dark:border-green-800 bg-green-50 dark:bg-green-900 p-2">
        {{ flashSuccess }}
      </div>
      <slot>Default</slot>
    </main>
</template>

<script setup>
import { computed } from 'vue'
import { Link, usePage } from '@inertiajs/vue3'
import { route } from 'ziggy';
const page = usePage()
const flashSuccess = computed(
  () => page.props.flash.success,
)
const user = computed(
  () => page.props.user
)
</script>