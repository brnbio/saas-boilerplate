<template>

    <div class="form-floating">
        <VueSelect v-bind="$attrs"
                   v-model="form[name]"
                   label="text"
                   :reduce="model => model.id"
                   :clearable="false"
                   :options="selectOptions"
                   :value="form[name]"
                   :class="{'is-invalid': form.errors[name]}"
                   @search="filterOptions" />
        <label class="form-label">{{ label }}</label>
        <div class="invalid-feedback" v-if="form.errors[name]">
            {{ form.errors[name] }}
        </div>
    </div>

</template>

<script setup>

import { computed, inject, ref } from 'vue';
import VueSelect                 from 'vue-select';

const form = inject('form');
const props = defineProps({
    name: String,
    label: String,
    options: Array,
    required: {
        type: Boolean,
        default: false
    }
});
let search = ref('');
const selectOptions = computed(() => {
    if (props.options.length < 100) {
        return props.options;
    }
    if (search.value.length > 3) {
        return props.options.slice(0, 100);
    }
    if (form[props.name]) {
        return props.options.filter(item => item.id === form[props.name]);
    }
    return [];
});

function filterOptions(query) {
    search.value = query;
}

</script>

<script>

export default { inheritAttrs: false };

</script>