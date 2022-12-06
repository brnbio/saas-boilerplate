<template>

    <Layout blank>
        <div class="row">
            <div class="col-sm-6">
                <PageTitle title="Passwort zurücksetzen" />
                <form @submit.prevent="submit">
                    <FormControl type="email" name="email" label="E-Mail-Adresse" required />
                    <FormControl type="password" name="password" label="Passwort" required />
                    <FormControl type="password" name="password_confirmation" label="Passwort bestätigen" required />
                    <button type="submit" class="btn btn-primary">Passwort zurücksetzen</button>
                    <Link href="/" class="btn btn-link fw-normal text-muted">Abbrechen</Link>
                </form>
            </div>
        </div>
    </Layout>

</template>
<script setup>

import { Link, useForm } from '@inertiajs/inertia-vue3';
import Layout from '~/layout/login';
import PageTitle from '~/components/page-title';
import FormControl from '~/components/forms/form-control';
import { provide } from 'vue';

const props = defineProps({
    token: String,
    email: String
});
const form = useForm({
    token: props.token,
    email: props.email,
    password: null,
    password_confirmation: null
});
provide('form', form);

function submit() {
    form.post(route('password.update', props.token), {
        onSuccess: function () {
            form.reset('password', 'password_confirmation');
        }
    });
}

</script>