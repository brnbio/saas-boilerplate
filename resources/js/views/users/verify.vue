<template>

    <Layout>
        <PageTitle title="E-Mail-Adresse bestätigen" />
        <p>
            Bitte bestätige Deine E-Mail-Adresse.
            Du hast keine E-Mail von uns erhalten?<br>
            Kein Problem. Wir senden Dir direkt eine neue E-Mail mit dem Link zum Bestätigen.
        </p>
        <Link :href="route('verification.resend')" class="btn btn-primary" method="post" as="button">Erneut senden</Link>
    </Layout>

</template>
<script setup>

import { Link }  from '@inertiajs/inertia-vue3';
import Layout    from '~/layout/login';
import PageTitle from '~/components/page-title';

</script>