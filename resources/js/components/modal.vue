<template>

  <div class="modal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header" v-if="title">
          <h5 class="modal-title">{{ title }}</h5>
        </div>
        <div class="modal-body">
          <slot name="modal-body" />
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-link" data-bs-dismiss="modal">Abbrechen</button>
          <slot name="modal-footer" />
        </div>
      </div>
    </div>
  </div>

</template>

<script setup>

defineProps({
  title: { type: String, required: false }
});

</script>