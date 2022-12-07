<template>
    
    <Layout>
        <PageTitle title="Billing" />
        
        <h5>Paket</h5>
        
        <h5>Zahlungsmethode</h5>
        
    </Layout>

</template>
<script setup>

import PageTitle            from '~/components/page-title';
import Layout               from '~/layout/app';

defineProps({
    intent: Object
});

</script>