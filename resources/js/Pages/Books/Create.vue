
<template>

    <div class="w-full max-w-xs m-6">

        <Link :href="route('books.index')" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"> Regresar a pantalla principal </Link>

        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" v-on:submit.prevent="createBook">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                    Titulo del libro
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="title" type="text" placeholder="Nombre del libro" v-model="form.title">
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    Nombre del artista
                </label>
                <input class="shadow appearance-none border border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="artist" type="text" placeholder="Artista" v-model="form.artist">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                    Ano de publicacion
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="year" type="number" placeholder="Ano de publicacion" v-model="form.year">
            </div>

            <div class="flex items-center justify-between">

                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Agregar Libro
                </button>
            </div>
        </form>
        <p class="text-center text-gray-500 text-xs">
            &copy;2020 Acme Corp. All rights reserved.
        </p>
    </div>


</template>



<script>
import {Link, useForm} from '@inertiajs/inertia-vue3';

export default{

    components:{

        Link
    },

    data(){

        return{

            form:{

                title: '',
                artist:'',
                year: ''

            }

        }

    },

    methods:{

        async createBook(){


            try {

                const response = await axios.post(route('books.index'), this.form);

                console.log(response);

                const url = response.config.url;

                window.location.href = url;
            }

            catch (error){

                 console.log(error.message);

            }


        }
    }
    //
    //
    // setup(){
    //
    //     // const form = useForm({
    //     //
    //     //     title: '',
    //     //     artist:'',
    //     //     year: ''
    //     // })
    //     //
    //     // return {form}
    //
    // }


}





</script>
