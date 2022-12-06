<template>
    
    <Layout>
        <div class="row">
            <div class="col-sm-6">
                <PageTitle title="Confirm password" />
                <form @submit.prevent="submit">
                    <FormControl type="password" name="password" label="Password" required />
                    <button type="submit" class="btn btn-primary">Confirm Password</button>
                    <Link href="/" class="btn fw-normal text-muted">Cancel</Link>
                </form>
            </div>
        </div>
    </Layout>

</template>
<script setup>

import { Link, useForm } from '@inertiajs/inertia-vue3';
import { provide }       from 'vue';
import FormControl       from '~/components/forms/form-control';
import PageTitle         from '~/components/page-title';
import Layout            from '~/layout/login';

const form = useForm({
    password: null
});
provide('form', form);

function submit() {
    form.post(route('password.confirm'), {
        onSuccess: () => form.reset('password')
    });
}

</script>