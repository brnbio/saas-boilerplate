<template>
    
    <Layout>
        <PageTitle title="Account" />
        <form @submit.prevent="submit">
            <FormControl name="name" label="Vorname" required />
            <FormControl type="email" name="email" label="E-Mail-Adresse" required />
            <FormControl type="password" name="new_password" label="Neues Passwort" />
            <FormControl type="password" name="new_password_confirmation" label="Neues Passwort bestätigen" />
            <button type="submit" class="btn btn-primary">Speichern</button>
        </form>
    </Layout>

</template>
<script setup>

import { useForm, usePage } from '@inertiajs/inertia-vue3';
import { provide }          from 'vue';
import FormControl          from '~/components/forms/form-control';
import PageTitle            from '~/components/page-title';
import Layout               from '~/layout/app';

const user = usePage().props.value.user;
const form = useForm({
    name: user.name,
    email: user.email,
    new_password: null,
    new_password_confirmation: null
});
provide('form', form);

function submit() {
    form.post(route('account'), {
        onSuccess: () => form.reset('new_password', 'new_password_confirmation')
    });
}

</script>