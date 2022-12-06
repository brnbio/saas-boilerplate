<template>
    
    <Layout>
        <PageTitle title="Registrieren" />
        <section class="mb-4">
            Du hast schon einen Account?
            <Link :href="route('login')" class="fw-bold text-primary">
                Anmelden
            </Link>
        </section>
        <form @submit.prevent="submit">
            <FormControl name="name" label="Name" required />
            <FormControl type="email" name="email" label="E-Mail-Adresse" required />
            <FormControl type="password" name="password" label="Passwort" required />
            <FormControl type="password" name="password_confirmation" label="Passwort bestätigen" required />
            <button type="submit" class="btn btn-primary">Registrieren</button>
        </form>
    </Layout>

</template>
<script setup>

import { Link, useForm } from '@inertiajs/inertia-vue3';
import { provide }       from 'vue';
import FormControl       from '~/components/forms/form-control';
import PageTitle         from '~/components/page-title';
import Layout            from '~/layout/login';

const form = useForm({
    name: null,
    email: null,
    password: null,
    password_confirmation: null
});
provide('form', form);

function submit() {
    form.post(route('register'), {
        onSuccess: () => form.reset('password', 'password_confirmation')
    });
}

</script>