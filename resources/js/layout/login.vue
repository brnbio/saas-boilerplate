<template>
    
    <main class="container-fluid position-relative">
        <slot />
    </main>
    <FlashMessages />

</template>
<script setup>

import FlashMessages from '~/layout/html/flash';

</script>