new Vue({
  el: '#container', 
  data: {
	salary: 1800,
  },
  ready: function() {
	console.log('Vuejs initialized with salary 1800');
  },
  methods: {
	showAlert: function() {
	  alert("Your Annual salary: "+this.salary * 12);
	}
  }
});