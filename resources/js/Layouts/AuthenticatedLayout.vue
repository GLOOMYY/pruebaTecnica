<script setup>
import { ref } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { Link } from '@inertiajs/vue3';

const showingNavigationDropdown = ref(false);
</script>

<template>
  <div>
      <div class="min-vh-100 bg-light">
          <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
              <div class="container-fluid">
                  <div class="d-flex justify-content-between align-items-center">
                      <div class="d-flex align-items-center">
                          <!-- Logo -->
                          <div class="me-0 me-md-4">
                              <Link :href="route('dashboard')">
                                  <ApplicationLogo class="navbar-brand" />
                              </Link>
                          </div>

                          <!-- Navigation Links -->
                          <div class="d-none d-sm-flex me-10">
                              <NavLink :href="route('dashboard')" :active="route().current('dashboard')">
                                  Dashboard
                              </NavLink>
                          </div>
                      </div>



                      
                  </div>
              </div>

              <!-- Responsive Navigation Menu -->
              <div :class="{ show: showingNavigationDropdown, hide: !showingNavigationDropdown }">

                  <!-- Responsive Settings Options -->
                  <div class="border-top pt-4 pb-1">
                      <div>
                          <div class="fw-bold">{{ $page.props.auth.user.name }}</div>
                          <div class="text-muted">{{ $page.props.auth.user.email }}</div>
                      </div>

                      <div class="mt-3">
                          <ResponsiveNavLink :href="route('profile.edit')" class="btn btn-primary mb-3">Profile</ResponsiveNavLink>
                          <ResponsiveNavLink :href="route('logout')" method="post" as="button" class="btn btn-primary">
                              Log Out
                          </ResponsiveNavLink>
                      </div>
                  </div>
              </div>
          </nav>

          <header class="bg-white shadow-sm" v-if="$slots.header">
              <div class="container py-4">
                  <slot name="header" />
              </div>
          </header>

          <!-- Page Content -->
          <main>
              <slot />
          </main>
      </div>
  </div>
</template>

  
  
  
