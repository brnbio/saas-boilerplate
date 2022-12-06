<template>
    
    <Header class="sticky-top" />
    
    <main class="container-fluid position-relative">
        <slot />
    </main>
    
    <FlashMessages />

</template>
<script setup>

import FlashMessages from '~/layout/html/flash';
import Header        from '~/layout/html/header';

</script>