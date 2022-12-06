<template>

  <i :class="'bx ' + (inline ? '' : 'bx-fw ') + (solid ? 'bxs' : 'bx') + '-' + name"></i>

</template>

<script setup>

defineProps({
  name:   String,
  inline: { type: Boolean, default: false },
  solid:  { type: Boolean, default: false }
});

</script>