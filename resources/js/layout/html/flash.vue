<template>

    <div class="toast-container position-absolute top-0 end-0 p-3">
        <div v-for="alert in $page.props.flash" :class="'toast text-white bg-' + alert.level" role="alert">
            <div class="toast-body d-flex justify-content-between align-items-center">
                <div>
                    <strong v-if="alert.level === 'success'">Erfolgreich!<br></strong>
                    <strong v-if="alert.level === 'error'">Fehler!<br></strong>
                    {{ alert.message }}
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"></button>
            </div>
        </div>
    </div>

</template>

<script>
import { Toast } from 'bootstrap';

let initToasts = function () {
    [].slice
        .call(document.querySelectorAll('.toast'))
        .map(function (toastEl) {
            new Toast(toastEl, { delay: 1500 }).show();
        });
}

export default {
    mounted() {
        initToasts();
    },
    updated() {
        initToasts();
    }
};
</script>