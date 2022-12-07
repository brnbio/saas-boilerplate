<template>
    
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <Link class="navbar-brand" :href="route('home')">{{ $page.props.appName }}</Link>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar">
                <Icon name="menu" />
            </button>
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                           aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown">
                            {{ $page.props.user.name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <DropdownItem :href="route('account')">Account</DropdownItem>
                            <DropdownItem :href="route('billing')">Billing</DropdownItem>
                            <li><hr class="dropdown-divider"></li>
                            <DropdownItem :href="route('logout')" method="post" as="button">Logout</DropdownItem>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

</template>
<script setup>

import { Link }     from '@inertiajs/inertia-vue3';
import DropdownItem from '~/components/dropdown-item';
import Icon         from '~/components/icon';

</script>