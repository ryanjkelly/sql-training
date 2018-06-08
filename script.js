
var app = {
  main: {}
};

app.main.initial_data = {
  tables_exist: false
}

app.main.instance = new Vue({
  el: '#app--main',
  data: app.main.initial_data,
  watch: {},
  methods: {},
  mounted: function() {
    this.$nextTick(function () {
      console.info( 'main app loaded' );
    });
  }
});