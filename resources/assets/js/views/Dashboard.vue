<template>
	<div class="">
	    <div class="page-title">
	      <div class="title_left">
	        <h3>Dashboard</h3>
	      </div>
	    </div>

	    <div class="row">
		  <div class="col-md-12 col-sm-12 col-xs-12">
		    <box title='Chart'>
		    	<d3-circle
				    :data="data"
				    :options="options"
				    :margin="margin"
				    width="100%"
				    height="400px">
				</d3-circle>
				<d3-pie
			    :data="datapie"
			    :options="optionspie"
			    :margin="margin"
			    width="100%"
			    height="400px">
			</d3-pie>
		    </box>
		  </div>
		</div>
	</div>
</template>
<script>
	import Vue from 'vue'
	import Box from '../components/Box'
	import Vs from 'd3-vs';

// install globally all components
Vue.use(Vs);

// import only the components that you need and register it manually
import {
    // Flow transition
    d3SankeyCircular,

    // Time Serie
    d3Timelion,
    d3Timeline,

    // Basic
    d3Pie,
    d3Line,
    d3Metric,
    d3MultiLine,
    d3HorizontalBar,
    d3VerticalBar,
    d3Area,

    // Functional
    d3Tracker,
    d3Slider,
    d3ProgressArc,

    // Layout
    d3Sunburst,
    d3Tree,
    d3Pack,
    d3Cluster,
    d3ICicleVertical,
    d3ICicleHorizontal,

    // Leaflet
    d3LChoropleth,
    d3LHeat
} from 'd3-vs';


	

export default {
 components: {'box' : Box},
 data() {
 	return{
 		data : 0.2,
 		margin : {top: 30, right: 20, bottom: 30, left: 50},
 		options: {delay : 2000},
 		datapie : [   { label: "JavaScript", value: 50 },
			            { label: "Ruby", value: 20 },
			            { label: "Java", value: 30}
            	   ],
        optionspie: {delay : 2000, arcTitle: d => d.data.label + '<br>' + d.data.value, arcLabel:d => d.data.label + ' ' + d.data.value},

 	}
 },
 computed: {
    	value() {
    		return  this.$store.state.users
    	}
    },
}
</script>