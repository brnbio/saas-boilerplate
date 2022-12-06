<template>

    <div class="form-check">
        <label>
            <input v-model="form[name]"
                   class="form-check-input"
                   :class="{'is-invalid': form.errors[name]}"
                   v-bind="$attrs"
                   type="checkbox" />
            {{ label }}
        </label>
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