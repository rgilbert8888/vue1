<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Vue</title>

  <!-- CSS -->
  <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>

  <!-- navigation bar -->
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <a class="navbar-brand"><i class="glyphicon glyphicon-bullhorn"></i> Vue Events Bulletin Board</a>
    </div>
  </nav>

  <!-- ####   main body of our application  #### -->
  <div class="container" id="events">

    <!-- add an event form -->
    <div class="col-sm-6">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3>Add an Event</h3>
        </div>
        <div class="panel-body">
          <div class="panel-body">

            <div class="form-group">
              <input class="form-control" placeholder="Event Name" v-model="event.name">
            </div>

            <div class="form-group">
              <textarea class="form-control" placeholder="Event Description" v-model="event.description"></textarea>
            </div>

            <div class="form-group">
              <input type="date" class="form-control" placeholder="Date" v-model="event.date">
            </div>

            <button class="btn btn-primary"  @click="addEvent">Submit</button>

          </div>

        </div>

      </div>
    </div>

    <!-- show the events -->
      <!-- To list out the events, we’ll need HTML in which we will include some templating. -->
    <div class="col-sm-6">

      <div class="list-group">
        <!-- LOOP OVER ITEMS WITH v-repeat: for each event in the events array, show this stuff: -->
        <a href="#" class="list-group-item" v-for="event in events">

          <h4 class="list-group-item-heading">
            <i class="glyphicon glyphicon-bullhorn"></i> 
            {{ event.name }}
          </h4>          
          <h5>
            <i class="glyphicon glyphicon-calendar" v-if="event.date"></i> 
            {{ event.date }}
          </h5>

          <p class="list-group-item-text" v-if="event.description">{{ event.description }}</p>

          <button class="btn btn-xs btn-danger" @click="deleteEvent(event)" id="{{ event.eventID }}">Delete</button>
        </a>

      </div>
    </div>


  </div>

  <!-- ####   end main body of our application  #### -->


  <div class="container" id="app">
    <greeting></greeting>
  </div>
  <div class="container" id="foo">
    <post :title="title" :author="author" :content="content"></post>
  </div>




<!-- CREATE TEMPLATES THAT DONT GET RENDERED UNLESS CALLED BY TAG NAME -->
  <template id="greeting-template">        
      <h1>Welcome!</h1>
      <button class="btn btn-primary">login</button>
      <button class="btn btn-primary">signup</button>
  </template>
  
  <template id="post-template">
      <h1>{{ title }}</h1>
      <h4>{{ author }}</h4>
      <p>{{ content }}</p>
  </template>

  <!-- JS -->
  <script src="node_modules/vue/dist/vue.js"></script>
  <script src="node_modules/vue-resource/dist/vue-resource.js"></script>
  <script src="app.js"></script>
</body>
</html>


<!-- NOTE: The main <div> with an ID of events is our target area for the application. 
          Add a directive called v-model to our input and textarea elements and we’re assigning distinct spots on an event object to each. 
          v-on directive with a value of "click: addEvent" -> pass a method to be run on the click event
           we’re using Vue’s v-repeat on the a tag to loop over the events 