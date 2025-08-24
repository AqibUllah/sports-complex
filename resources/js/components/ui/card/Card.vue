<script setup lang="ts">
import type { HTMLAttributes } from 'vue'
import { cn } from '@/lib/utils'

const props = defineProps<{
  class?: HTMLAttributes['class']
}>()
</script>

<template>
  <div
    data-slot="card"
    :class="
      cn(
        'bg-card text-card-foreground flex flex-col rounded-xl border border-white/10 shadow-sm',
        props.class,
      )
    "
  >
    <slot />
  </div>
</template>
