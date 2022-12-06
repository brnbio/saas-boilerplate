<template>

    <Layout>
        <div class="row">
            <div class="col-sm-6">
                <PageTitle title="Anmelden" />
                <section class="mb-4">
                    Du hast noch keinen Account?
                    <Link :href="route('register')" class="fw-bold text-primary">
                        Registrieren
                    </Link>
                </section>
                <form @submit.prevent="submit">
                    <FormControl name="email" type="email" label="E-Mail-Adresse" required />
                    <FormControl name="password" type="password" label="Passwort" required />
                    <FormCheckbox name="remember" label="Angemeldet bleiben" />
                    <div class="d-flex justify-content-between align-items-center">
                        <button type="submit" class="btn btn-primary" :disabled="form.processing">
                            Anmelden
                        </button>
                        <Link class="small text-muted" :href="route('password.request')">
                            Passwort vergessen?
                        </Link>
                    </div>
                </form>
            </div>
        </div>
    </Layout>

</template>
<script setup>

import { provide } from 'vue';
import { Link, useForm } from '@inertiajs/inertia-vue3';
import Layout from '~/layout/login';
import PageTitle from '~/components/page-title';
import FormControl from '~/components/forms/form-control';
import FormCheckbox from '~/components/forms/form-checkbox';

const form = useForm({
    email: null,
    password: null,
    remember: false
});
provide('form', form);

function submit() {
    form.post(route('login'), {
        onSuccess: () => form.reset('password')
    });
}

</script>