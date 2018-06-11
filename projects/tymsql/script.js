
var app = {
  fn: {},
  main: {}
}

app.fn.initLessonSearch = function() {

  var lessonSearch = new List( 'lesson-list',{
    listClass: 'lessons__list',
    valueNames: [ 'card-title', 'card-text', 'lesson__button' ],
    searchClass: 'lesson-search-field'
  });

}

app.main.initial_data = {
  db_query: '...',
  db_render: '...',
  json_response: '...',
  lessons_list: null,
  lessons: []
}

var lessonId = 0;

app.fn.addLesson = function( obj ) {

  app.main.initial_data.lessons.push({
    id: lessonId++,
    page: obj.page,
    slug: obj.slug,
    name: obj.name,
    desc: obj.desc
  });

}

app.fn.addLesson({
  page: 231,
  slug: 'lesson-1a',
  name: 'Lesson 1a',
  desc: 'This statement will create database tables.'
});

app.fn.addLesson({
  page: 231,
  slug: 'lesson-1b',
  name: 'Lesson 1b',
  desc: 'This statement will populate all your database tables.'
});

app.fn.addLesson({
  page: 14,
  slug: 'lesson-2a',
  name: 'Lesson 2a',
  desc: 'This statement will get all your products.'
});

app.fn.addLesson({
  page: 15,
  slug: 'lesson-2b',
  name: 'Lesson 2b',
  desc: 'This statement will...'
});

Vue.component( 'lesson', {
  props: ['lesson'],
  template: '<div class="lesson">' +
              '<div class="card">' +
                '<div class="card-body">' +
                  '<h5 class="card-title">' +
                    '{{lesson.name}}' +
                  '</h5>' +
                  '<p class="card-text">' +
                    '{{lesson.desc}} (pg {{lesson.page}})' +
                  '</p>' +
                  '<button v-on:click="select( lesson.slug )"' +
                          'type="button"' +
                          'class="lesson__button btn btn-primary">' +
                    'run {{lesson.slug}}' +
                  '</button>' +
                '</div>' +
              '</div>' +
            '</div>',
  methods: {
    select: function( slug ) {
      this.$emit( 'run', slug );
    }
  }
});

app.main.instance = new Vue({
  el: '#app--main',
  data: app.main.initial_data,
  watch: {},
  methods: {
    runLesson: function( lesson ) {

      var that = this;

      that.db_query = '...';
      that.db_render = '...';
      that.json_response = '...';

      if ( !lesson ) { return; }

      axios({

        method: 'get',
        url: '/sql/projects/tymsql/' + lesson + '/?cache=0'

      }).then( function( resp ) {

        that.db_query = resp.data.data.input;
        that.db_render = resp.data.data.output;
        that.json_response = resp.data;

      }).catch( function( err ) {

        console.log( err );

      });

    }
  },
  mounted: function() {
    this.$nextTick(function () {
      // this.runLesson( 'lesson-0a' );
      // console.info( 'main app loaded' );
      // launch quick search
      // this.lessons_list = new List( 'lesson-list', {
      //   // listClass: 'search-area',
      //   valueNames: ['card-title','card-text','lesson__button'],
      //   searchClass: 'lesson-search-field'
      // });
      // var testList = new List( 'lesson-list' );
      app.fn.initLessonSearch();
    });
  }
});
