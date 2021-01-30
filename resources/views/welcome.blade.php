<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        {{-- vue --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{ mix('/css/app.css') }}">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito';
            }
        </style>
    </head>
    <body class="antialiased">
        <div id="app">
            <!-- デフォルトだとこの中ではvue.jsが有効 -->
            <!-- example-component はLaravelに入っているサンプルのコンポーネント -->
            <example-component>
                <template>
                    <div class="container mx-auto">
                            <div class="container">
                                <div class="py-12">
                                <h1 class="text-center text-5xl text-gray-600">title</h1>
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
            
                                    <!-- <h4 v-if="activeItemEditIndex !== null">I'm currently editing:  filteredTodos[activeItemEditIndex].name </h4> -->
            
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
                                                        todoItem.name
                                                    </div>
                                                    <!-- todoItemIndex-->
            
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
                    </div>
                </div>
                
                </template>
            </div>
            <script>
            export default {
                el:'#app',
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
            </example-component>
        <!-- body タグの最後に足す-->
        <script src=" {{ mix('js/app.js') }} "></script>
    </body>
</html>
