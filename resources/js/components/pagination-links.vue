<template>

  <ul class="pagination" v-if="paginator.total">
    <li class="page-item" v-if="onFirstPage" :class="{'disabled': onFirstPage}">
      <a class="page-link" tabindex="-1">&laquo;</a>
    </li>
    <li class="page-item" v-else>
      <Link :href="paginator.prev_page_url" class="page-link" preserve-scroll>&laquo;</Link>
    </li>
    <li v-for="link in links" class="page-item" :class="{'active': link.active, 'disabled': link.url === null }">
      <Link :href="link.url" class="page-link" v-html="link.label" preserve-scroll />
    </li>
    <li class="page-item" v-if="hasMorePages">
      <Link :href="paginator.next_page_url" class="page-link" preserve-scroll>&raquo;</Link>
    </li>
    <li class="page-item" v-else :class="{'disabled': !hasMorePages}">
      <a class="page-link" tabindex="-1">&raquo;</a>
    </li>
  </ul>

</template>

<script setup>

import { Link } from '@inertiajs/inertia-vue3';
import { computed } from 'vue';

const props = defineProps({ paginator: Object });

const links = computed(() => {
  const links = props.paginator.links;
  links.shift();
  links.pop();

  return links;
});

const onFirstPage = computed(() => props.paginator.current_page === 1);
const hasMorePages = computed(() => props.paginator.current_page < props.paginator.last_page);

</script>