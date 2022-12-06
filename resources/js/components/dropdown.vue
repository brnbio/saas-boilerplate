<template>

  <button type="button" class="btn btn-inline dropdown-toggle" data-bs-toggle="dropdown">
    <Icon name="dots-horizontal-rounded" inline />
  </button>
  <ul class="dropdown-menu dropdown-menu-end">
    <slot />
  </ul>

</template>

<script setup>

import Icon from '~/components/icon';

</script>