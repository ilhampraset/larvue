<template>
<div class="page-title">
  <slot></slot>
  <div class="title_left">
    <h3>{{left}}</h3>
  </div>
 
</div>
</template>
<script>
export default {
 props: {
    left: {
      type: String,
      required: true
    }
  },
}
</script>