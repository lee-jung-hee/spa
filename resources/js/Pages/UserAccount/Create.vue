<template>
    <form @submit.prevent="register">
        <div class="w-1/2 mx-auto">
            <div>
                <label for="name" class="label">성함</label>
                <input id="name" v-model="form.name" type="text" class="input" />
                <div v-if="form.errors.name" class="input-error">{{ form.errors.name }}</div>
            </div>
            <div class="mt-4">
                <label for="email" class="label">E-mail</label>
                <input id="email" v-model="form.email" type="text" class="input" />
                <div v-if="form.errors.email" class="input-error">{{ form.errors.email }}</div>
            </div>
            <div class="mt-4">
                <label for="password" class="label">비밀번호</label>
                <input id="password" v-model="form.password" type="password" class="input" placeholder="8자리 이상 숫자와 대문자가 조합되어야합니다"/>
                <div v-if="form.errors.password" class="input-error">{{ form.errors.password }}</div>
            </div>
            <div class="mt-4">
                <label for="password_confirmation" class="label">비밀번호 확인</label>
                <input id="password_confirmation" v-model="form.password_confirmation" type="password" class="input" placeholder="비밀번호를 다시한번 입력해주세요" />
            </div>
            <div class="mt-4">
                <button class="btn-primary w-full" type="submit">계정 만들기</button>
            </div>
            <div class="mt-2 text-center text-gray-500">
                <Link :href="route('login')">로그인</Link>
            </div>
        </div>
    </form>
</template>

<script setup>
import { useForm, Link } from '@inertiajs/vue3'

const form = useForm({
    name: null,
    email: null,
    password: null,
    password_confirmation: null,
})
const register = () => form.post(route('user-account.store'))
</script>