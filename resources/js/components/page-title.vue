<template>

    <Head>
        <title>{{ title }}</title>
    </Head>

    <div class="page-title flex-column-reverse flex-md-row">
        <h1 class="mb-3 mb-lg-0 text-primary">{{ title }}</h1>
        <span class="text-end mb-5 mb-md-0 d-print-none">
            <slot />
        </span>
    </div>

</template>

<script setup>

import { Head } from '@inertiajs/inertia-vue3';

defineProps({ title: String });

</script>