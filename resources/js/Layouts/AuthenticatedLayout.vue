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
            <div class="d-flex justify-content-between align-items-center w-100">
              <!-- Enlace a Dashboard (A la Izquierda) -->
              <div class="d-flex align-items-center">
                <div class="me-auto">
                  <a :href="route('dashboard')" :class="{ 'active': route().current('dashboard') }" class="nav-link fw-bold fs-4">
                    Dashboard
                  </a>
                </div>
              </div>
  
              <!-- Información del Usuario (A la Derecha) -->
              <div class="d-flex align-items-center">
                <div class="ms-auto">
                  <div class="border-top pt-4 pb-1">
                    <div>
                      <div class="fw-bold">{{ $page.props.auth.user.name }}</div>
                      <div class="text-muted">{{ $page.props.auth.user.email }}</div>
                    </div>
    
                    <div class="mt-3">
                      <a :href="route('profile.edit')" class="btn btn-link">Profile</a>
                      <form :action="route('logout')" method="post" class="d-inline">
                        <button type="submit" class="btn btn-link">Log Out</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
  
            <!-- Responsive Navigation Menu -->
            <div :class="{ 'show': showingNavigationDropdown, 'hide': !showingNavigationDropdown }" class="collapse navbar-collapse">
              <div class="pt-2 pb-3">
                <a :href="route('dashboard')" :class="{ 'active': route().current('dashboard') }" class="nav-link d-lg-none fw-bold fs-4">
                  Dashboard
                </a>
              </div>
    
              <!-- Responsive Settings Options (A la Izquierda) -->
              <div class="border-top pt-4 pb-1 d-lg-none">
                <div class="mt-3">
                  <a :href="route('profile.edit')" class="btn btn-link">Profile</a>
                  <form :action="route('logout')" method="post" class="d-inline">
                    <button type="submit" class="btn btn-link">Log Out</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </nav>
  
        <!-- Page Content -->
        <main>
          <slot />
        </main>
      </div>
    </div>
  </template>
  
  
  
  
  
