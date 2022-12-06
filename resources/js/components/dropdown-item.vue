<template>
    
    <li>
        <Link class="dropdown-item" v-bind="$attrs">
            <slot />
        </Link>
    </li>

</template>
<script setup>

import { Link } from '@inertiajs/inertia-vue3';

</script>
<script>export default { inheritAttrs: false }</script>