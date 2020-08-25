vue instance
-vue instance
-data
-methods
-lifecycle

template syntax
-text
-raw text
-attribute
-js expression
-directives
-modifiers
-shorthand

computed and watchers

class and style binding

conditional rendering
list rendering
event handling
form input binding
component

```cs
v-for="post in posts"   # for loop
v-text="post.body"      # same as {{ post.body }}
```

## events

```cs
v-on:[event]            # event listener; @[event] shorthand


v-on[customEvent]       #  create custom event; @[customEvent] shorthand
```

## two-way data binding

```cs
v-model="msg"  # bind input to data msg
```

## attribute and class binding

```cs
v-bind:class  # bind class or attribute; :[attribute] shorthand
```

## Inline component

- add **inline-template** to component tag

```js
<progress-view inline-template>
  <p>Your progress: {{ progress }}</p>
</progress-view>

<script>
  Vue.component("progress-view", {
    data() {
      return {
        progress: 90,
      };
    },
  });

  new Vue({
    el: "#app",
  });
</script>
```

## slot

- template placeholder

```js
template: `<div>
  <slot name="header"></slot>
  <slot name="body"></slot>
  <slot></slot>
  </div>`;

<component>
  <div slot="header"></div>
  <component2 slot="body"></component2>
  <p>Footer</p>
</component>;
```

## Throttle vs Debounce

```cs
throttle       # same as set timeout
debounce       # wait all request then set timeout
```

# Reverse text

```js
<div id="app">
  <h2>{{ reverse }}</h2>
</div>

<script>
  new Vue({
    el: "#app",
    data: {
      msg: "Hello World!",
    },
    computed: {
      reverse() {
        return this.msg.split("").reverse().join("");
      },
    },
  });
</script>

```

## Event wrapper
```js
window.Event = new (class {
  constructor() {
    this.vue = new Vue();
  }

  fire(event, data = null) {
    this.vue.$emit(event, data);
  }

  listen(event, callback) {
    this.vue.$on(event, callback);
  }
})();
```s