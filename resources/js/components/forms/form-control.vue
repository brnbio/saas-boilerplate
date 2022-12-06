<template>
    
    <div class="form-floating">
        <input v-model="form[name]"
               class="form-control"
               :class="{'is-invalid': form.errors[name]}"
               :placeholder="label"
               v-bind="$attrs" />
        <label class="form-label">{{ label }}</label>
        <div class="invalid-feedback" v-if="form.errors[name]">
            {{ form.errors[name] }}
        </div>
    </div>

</template>
<script setup>

import { inject } from 'vue';

const form = inject('form');
const props = defineProps({
    name: String,
    label: String
});

</script>
<script>export default { inheritAttrs: false }</script>