<template>

    <Layout>
        <div class="row">
            <div class="col-sm-6">
                <PageTitle title="Passwort vergessen" />
                <form @submit.prevent="submit">
                    <FormControl type="email" name="email" label="E-Mail-Adresse" required />
                    <button type="submit" class="btn btn-primary">Passwort zurücksetzen</button>
                    <Link href="/" class="btn fw-normal text-muted">Abbrechen</Link>
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

const form = useForm({ email: null });
provide('form', form);

function submit() {
    form.post(route('password.email'), {
        onSuccess: function () {
            form.reset('email');
        }
    });
}

</script>