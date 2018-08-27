<template>
<div class="x_panel">
  <div class="x_title">
  		<h3>{{title}}</h3>
    <div class="clearfix"></div>
  </div>
  <div class="x_content">
  	<slot></slot>
  </div>
</div>
</template>
<script>
export default{
	props : ['title']
}
</script>