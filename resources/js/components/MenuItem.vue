<script setup lang="ts">

import { Link } from '@inertiajs/vue3';
import type { HTMLAttributes } from 'vue';
import { cn } from '@/lib/utils'

const props = defineProps<{
    href: string,
    active?: boolean,
    url?: string,
    name: string
    class?: HTMLAttributes['class']
}>()

</script>

<template>
    <Link
        :href="props.url"
        class="hover:text-primary-light dark:hover:text-primary-dark hover:text-white hover:transition-colors px-3 py-2 rounded-md text-sm font-medium"
        :class="cn(props.class, {' dark:text-primary-dark text-primary-light font-bold': $page.url === props.url })"
    >
        {{ props.name }}
    </Link>
</template>

<style scoped>

</style>
