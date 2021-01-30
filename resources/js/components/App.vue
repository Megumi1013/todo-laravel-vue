<template>
   <div class="container mx-auto">
                <div class="container">
                    <div class="py-12">
                    <h1 class="text-center text-5xl text-gray-600">{{ title }}</h1>
                    </div>

                    <form class="todo-form" @submit.prevent="submit">
                    <div>
                        <input type="text" 
                            v-model="newTodoItem"
                            placeholder="What do you need to do?"
                            class="p-4 max-w-xl mx-auto bg-white rounded-xl shadow-md flex items-center 
                                    space-x-4 border border-transparent focus:outline-none focus:ring 
                                    focus:ring-blue-300 focus:border-transparent w-full">
                        <!-- <button @click="test" ref="comment" type="button">Add to list</button> -->
                    </div>
                    </form>
                    
                    <div class="my-4 max-w-xl mx-auto">
                        <!-- @click="sortComplete" -->
                        <ul class="flex justify-between">
                            <li @click="sortAll" class="mr-8 text-gray-500 align-middle cursor-pointer">
                                <i class="material-icons">
                                    keyboard_arrow_down
                                </i>
                                All
                            </li>
                            <li @click="sortCompleted" class="mr-8 text-gray-500 align-middle cursor-pointer">
                                <i class="material-icons">
                                    keyboard_arrow_down
                                </i>
                                Completed
                            </li>
                            <li @click="sortTrashed" class="text-gray-500 align-middle cursor-pointer">
                                <i class="material-icons">
                                    keyboard_arrow_down
                                </i>
                                Trashed
                            </li>

                            <li @click="clearCompleted" class="ml-auto text-gray-500 align-middle cursor-pointer">
                                <i class="material-icons">
                                    delete_outline
                                </i>
                                Trash Completed
                            </li>
                        </ul>
                    </div>

                    <div class="my-4 p-6 max-w-xl mx-auto bg-white rounded-xl shadow-md">

                    <!-- <h4 v-if="activeItemEditIndex !== null">I'm currently editing: {{ filteredTodos[activeItemEditIndex].name }}</h4> -->
                        <div v-for="(todoItem, todoItemIndex) in filteredTodos"  class="flex items-center py-3">
                            <!-- How to use v-key..? v-bind:key="todoItem.id" -->
                            <div class="flex items-center mr-auto w-full">
                                <div class="flex-1">
                                    <label for="checkBox" class="bg-white border-2 rounded-full border-gray-200 w-8 h-8 flex flex-shrink-0 justify-center items-center mr-4 focus-within:border-blue-300">
                                        <input 
                                            @click="changeState(todoItem)" 
                                            class="opacity-0 absolute cursor-pointer w-8 h-8" 
                                            id="checkBox"
                                            />
                                        <svg 
                                            v-show="todoItem.state" 
                                            class="fill-current w-4 h-4 text-blue-500"
                                            viewBox="0 0 20 20">
                                            <path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/>
                                        </svg>
                                    </label>
                                </div>

                                <div class="w-full">
                                    <div v-if="activeItemEditIndex !== todoItemIndex">
                                        {{ todoItem.name }}
                                    </div>
                                    <!-- {{ todoItemIndex }} -->

                                    <div v-else>
                                        <input
                                            type="text"
                                            v-model="todoItem.name"
                                            class="outline-none border-b-2 border-fuchsia-600 w-11/12"
                                            />
                                    </div>
                                </div>
                            </div>  
                            

                            <div class="flex items-center">
                                <button 
                                    v-if="activeItemEditIndex === todoItemIndex"
                                    @click="activeItemEditIndex = null"
                                    class="mr-3 bg-yellow-300 rounded h-8 w-8 flex items-center justify-center">
                                    <i class="material-icons text-white">save</i>
                                </button>
                                <button 
                                    v-if="activeItemEditIndex !== todoItemIndex"
                                    @click="editItem(todoItemIndex)"
                                    class="mr-3 bg-blue-300 rounded h-8 w-8 flex items-center justify-center">
                                    <i class="material-icons text-white">edit</i>
                                </button>
                                <button 
                                    @click="removeItem(todoItem)"
                                    class="bg-gray-300 rounded h-8 w-8 flex items-center justify-center">
                                    <i class="material-icons text-white">clear</i>
                                </button>
                            </div>
                     </div>
            </div>
        </div>
</template>

<script>

export default {
    data() {
            return {
                title: 'To do app',
                newTodoItem: '',
                activeFilter: null,
                todos:[],
                activeItemEditIndex: null
            }
            },
        computed: {
            filteredTodos() {
                switch (this.activeFilter) {

                    case 'completed':

                        return this.todos.filter(function(todo) {
                            //filter?
                            return todo.state && !todo.trashed;
                            // return todo.state === true;
                        });

                    case 'trashed':

                        return this.todos.filter(function(todo) {
                            return todo.trashed;
                        });

                    case null:
                    default:

                        return this.todos.filter(function(todo) {
                            return !todo.trashed;
                        });

                }
            },
        },
        methods:{
            submit: function(){
                if (this.newTodoItem.length > 0){

                    this.todos.push({
                        id: todoStorage.uid++,
                        name: this.newTodoItem,
                        state:false
                    });

                    this.newTodoItem = '';
                    console.log('Done pushing')
                }
            },
            changeState: function(todoItem){
                console.log(todoItem);
                todoItem.state = !todoItem.state;
                console.log(todoItem.state);
                if(todoItem.state === true){
                    show:true;

                }else if(todoItem.state === false){
                    show:false;
                }
            },
            removeItem: function(todoItem){
                var index = this.todos.indexOf(todoItem);
                this.todos.splice(index,1);
                // indexOf = find?
                // splice??
            },
            sortAll: function(){
                this.activeFilter = null;
            },
            sortCompleted: function(){
                this.activeFilter = 'completed';
            },
            sortTrashed: function(){
                this.activeFilter = 'trashed';
            },

            editItem(todoItemIndex){
                this.activeItemEditIndex = todoItemIndex;
                console.log(this.activeItemEditIndex);
            },
            
            clearCompleted: function(){
                console.log('clearCompleted');

                var that = this;

                this.todos.forEach(function (todo, index) {

                    if (todo.state) {
                        that.$set(that.todos[index], 'trashed', true);
                        // that.todos[index].trashed = true;
                        // that.$forceUpdate();
                        //$set?
                    }

                });
            }
        },
        watch:{
            todos:{
                handler:function(todos){
                    todoStorage.save(todos)
                },
                deep:true
            }
        },
        created(){
            this.todos = todoStorage.fetch()
        }
}
</script>
<style lang="scss">

</style>