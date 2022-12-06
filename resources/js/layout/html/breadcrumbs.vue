<template>

    <nav aria-label="breadcrumb" class="mb-3 small d-print-none">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <Link :href="route('home')">Dashboard</Link>
            </li>
            <slot />
            <li class="breadcrumb-item active" aria-current="page">{{ active }}</li>
        </ol>
    </nav>

</template>

<script setup>

import { Link } from '@inertiajs/inertia-vue3';

defineProps({
    active: String,
    links: Object
});

</script>