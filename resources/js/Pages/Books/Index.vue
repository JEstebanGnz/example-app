<template>


    <h1 class="font-semibold text-xl text-gray-800 leading-tight text-center mt-7">
        Libreria Alejandria
    </h1>

    <br/>

    <div class="flex justify-center">
        <Link :href="route('books.create')" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline items-center"> Anadir Libro </Link>
    </div>

    <div class="py-8">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <h1 v-if="isLoading"> Loading books... </h1>
            <h1 v-if="isError" class="text-red-700"> Hubo un error cargando la informacion, verifica nuevamente </h1>

            <table class="table-auto">
                <thead>
                <tr>
                    <th class="px-4 py-2">Titulo</th>
                    <th class="px-4 py-2">Autor</th>
                    <th class="px-4 py-2">Ano</th>
                    <th class="px-4 py-2">Editar</th>
                    <th class="px-4 py-2">Borrar</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="book in books" class="text-center">
                    <td class="border px-4 py-2"> {{book.title}}</td>
                    <td class="border px-4 py-2">  {{book.artist}}</td>
                    <td class="border px-4 py-2">  {{book.year}}</td>
                    <td class="border px-4 py-2"> <Link :href="route('books.edit', book.id)"
                                                        class="bg-purple-500 hover:bg-purple-700 text-white font-bold px-4 rounded focus:outline-none focus:shadow-outline"> Editar
                    </Link>
                    </td>
                    <td class="border px-4 py-2"> <button v-on:click="deleteBook(book.id)"
                                                          class="bg-red-500 hover:bg-red-700 text-white font-bold px-4 ml-4 rounded focus:outline-none focus:shadow-outline"> Borrar
                    </button></td>
                </tr>
                </tbody>
            </table>

        </div>
    </div>

</template>



<script>

import {Link} from "@inertiajs/inertia-vue3";
import axios from 'axios';
import {Inertia} from "@inertiajs/inertia";

export default{

    components:{

      Link
    },

    data(){

        return{

            isLoading: true,

            books:[],

            isError: false


        }

    },

    methods:{

        async getBooks(){



            try {

                const url = route('api.books.index');

                const books = await axios.get(url);

                console.log(books.data.books);

                this.books = books.data.books;

                this.isLoading = false;
            }

            catch (error) {

                error.message = "Hubo un error cargando la informacion, verifica nuevamente"
                console.log(error.message);
                this.isLoading = false;
                this.isError = true;
            }


        },


        async deleteBook(id){

            const resp = await axios.delete(`books/${id}`);

            console.log(resp);

            await this.getBooks();

        }
    },

    created(){

        this.getBooks()

    },


    // setup(){
    //
    //     const destroy = (id) =>{
    //
    //     if(confirm('seguro que lo quieres borrar?')){
    //
    //         Inertia.delete(route('books.delete', id))
    //
    //     }
    //
    //     }
    //
    //
    //     return {destroy}
    // }

}

</script>

<style>

body{
    background-color: #c5b5b5;
}

</style>
