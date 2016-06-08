
// set up a new view instance for each target section

	// v-model="event.name"
	// v-model="event.description"
	// v-model="event.date"
	// v-on="click: addEvent"

// our div#events section in html (above) :

new Vue({
	el: '#events',      		//  At this point, Vue is available anywhere within div#events

	data: { 					// Here we can register any values or collections that hold data for the app
		event: {name: '', description: '', date: '', eventID: ''},
		events: []
	},
  	ready: function() { 		// Anything within the ready function will run when the application loads
  		this.fetchEvents();
  	}, 
	methods: {					 // Methods we want to use in our application are registered here

		fetchEvents: function() {        // prepopulate cal with data already stored ...
		
			// If we had a back end with an events endpoint set up that responds to GET requests
	      // GET request
	      this.$http({url: 'functions/vue-get.php?method=get', method: 'GET'}).then(function (response) {
	        // success callback
	        	console.log(response.data);	
	            // set data on vm
          		this.$set('events', response.data)

	      }, function (response) {
	          // error callback
	          	console.log(response);
	      });

		},
		// Adds an event to the existing events array and posts it

		addEvent: function() {
			if(this.event.name) {    // checks to make sure we at least have a value present for event.name and if so, pushes the event onto the the events array
				
				this.event.insert = 1;	// set this to check for post in php
				this.$http({url: 'functions/vue-add.php', data: this.event, emulateJSON:true, method: 'POST'}).then(function (response) {
		        // success callback
		        	console.log(response.data);	
	          	 	// After, form is cleared by setting the event object keys back to empty strings / add to events array
	          	 	this.event.eventID = response.data;
	          	 	
	          	 	this.events.push(this.event);
	          		this.event = { name: '', description: '', date: '' }; 

			      }, function (response) {
			          // error callback
			          	console.log(response);
			      });

				}
			},

		deleteEvent: function(event) {
			if(event.eventID){
			  	if(confirm("Are you sure you want to delete this event?")) {

			  		this.$http({url: 'functions/vue-delete.php', data: { 'eventID' : event.eventID, 'delete' : 1 }, emulateJSON:true, method: 'POST'}).then(function (response) {
		        // success callback
		        		console.log(response.data);	
	          	 		this.events.$remove(event); 
	          	 		
				      }, function (response) {
				          // error callback
				          	console.log(response);
				      });

					}
				}
			}
		}
	});

						
// });
// this.events.$remove(index);
// $remove is a Vue convenience method similar to splice
			    // in the dom: <button v-on:click="deleteEvent(event)">
// The data key will be the object where all our ViewModel data is registered
// The ready function will run when the application loads and is useful for calling other methods to initialize the app with data
// The methods key is where we can register custom methods for the application


// >   event = object that will hold our form data,
// >   events = an empty array that will be populated with data when the application loads
// The $set method is provided by Vue and when used to put data onto an array, triggers a view update. Its first argument needs to be a string with the name of the keypath that we want to target.
// $remove convenience method which takes care of finding the index passed in from the view and removing the element from the DOM.
Vue.component('greeting', {
    template: '#greeting-template'
});

var vm = new Vue({
    el: '#app'
});



// Here we are defining props as an array of strings which map to 
// the fields 
// that the child component expects to receive from it's parent.

Vue.component('post', {
    template: '#post-template',
    props: ['title', 'author', 'content']
});

var foo = new Vue({
    el: '#foo',
    data: {
		author: 'Johnnie Walker',
		title: 'Aging Your Own Whisky',
		content: 'A bunch of steps and a whole lot of content'
	}
});



		// 	var events = [
		// 		{
		// 			id: 1,
		// 			name: 'TIFF',
		// 			description: 'FOO description',
		// 			date: '2016-02-02'
		// 		},
		// 		{
		// 			id: 2,
		// 			name: 'The Martian Premiere',
		// 			description: 'The Martian comes to theatres.',
		// 			date: '2015-10-02'
		// 		},
		// 		{
		// 			id: 3,
		// 			name: 'SXSW',
		// 			description: 'Music, film and interactive festival in Austin, TX.',
		// 			date: '2016-03-11'
		// 		}
		// 	];
		// // $set is a convenience method provided by Vue that is similar to pushing
		// // data onto an array
		//     this.$set('events', events);