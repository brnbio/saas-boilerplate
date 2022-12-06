<template>

    <div class="form-floating">
        <textarea class="form-control"
                  v-model="form[name]"
                  :class="{'is-invalid': form.errors[name]}"
                  v-bind="$attrs"
                  :placeholder="label"></textarea>
        <label class="form-label">{{ label }}</label>
        <div class="invalid-feedback" v-if="form.errors[name]">
            {{ form.errors[name] }}
        </div>
    </div>

</template>

<script setup>

import { inject } from 'vue';

const form = inject('form');
const props = defineProps({ name: String, label: String });

</script>

<script>

export default { inheritAttrs: false };

</script>