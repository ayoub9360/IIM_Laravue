<template>
    <app-layout>
        <div class="flex justify-between max-w-7xl mx-auto sm:px-6 lg:px-8 py-4">
            <h2 class="font-semibold text-4xl mb-2 text-gray-800 leading-tight">
                {{ this.project.title }}
            </h2>
            <p class="bg-red-600 hover:bg-red-500 h-full text-white font-bold py-2 px-8 rounded"
               @click="deleteOpen">
                Supprimer un projet
            </p>
        </div>

        <div v-if="delete"
             class="fixed border-2 shadow translatediv max-w-4xl h-1/4 mx-auto sm:px-6 lg:px-8 p-4 bg-gray-50 rounded-md justify-center flex flex-col">
            <p class="text-center">Voulez vous vraiment supprimer le projet " {{ project.title }} " ?</p>
            <div class="flex justify-end">
                <p class="bg-white hover:bg-gray-100 border-gray-500 border mr-2 font-bold py-2 px-8 rounded"
                   @click="deleteOpen">
                    Annuler</p>
                <p class="bg-red-600 hover:bg-red-500 text-white font-bold py-2 px-8 rounded"
                   @click="deleteCustomers">Supprimer</p>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pt-4 bg-gray-50 rounded-3xl shadow-lg border-2 pb-4">
            <form @submit.prevent="submit">

                <h2 class="text-2xl font-bold mb-2">Responsable projet</h2>
                <span>Ces informations serviront à savoir qui dirige le projet du coté du client</span>

                <div class="mt-4">
                    <label for="customers_id" class="mr-40 inline-block w-1/5">Client du projet</label>
                    <select class="ml-4 w-6/12 rounded" id="customers_id"
                            v-model="form.customers_id">
                        <option v-for="item in customers" :value="item.id" :key="item.id">
                            {{ item.social_reason }}
                        </option>
                    </select>
                    <p class="text-red-600">{{ errors.customers_id }}</p>
                </div>

                <div class="mt-4">
                    <label class="mr-40 inline-block w-1/5" for="responsable_name">Nom du responsable</label>
                    <input class="ml-4 w-6/12 rounded" type="text" id="responsable_name" placeholder=""
                           v-model="form.responsable_name">
                    <p class="text-red-600">{{ errors.responsable_name }}</p>
                </div>

                <div class="mt-4">
                    <label class="mr-40 inline-block w-1/5" for="responsable_surname">Prénom responsable</label>
                    <input class="ml-4 w-6/12 rounded" type="text" id="responsable_surname" placeholder=""
                           v-model="form.responsable_surname">
                    <p class="text-red-600">{{ errors.responsable_surname }}</p>
                </div>

                <div class="mt-4">
                    <label class="mr-40 inline-block w-1/5" for="responsable_number">Numéro responsable</label>
                    <input class="ml-4 w-6/12 rounded" type="text" id="responsable_number" placeholder=""
                           v-model="form.responsable_number">
                    <p class="text-red-600">{{ errors.responsable_number }}</p>
                </div>


                <h2 class="mt-8 font-bold text-2xl">Information projet</h2>
                <span class="mt-2">Use a permanent address where you can receive mail.</span>

                <div class="mt-4">
                    <label class="mr-40 inline-block w-1/5" for="title">Titre</label>
                    <input class="ml-4 w-6/12 rounded" type="text" id="title" placeholder="Titre..."
                           v-model="form.title">
                    <p class="text-red-600">{{ errors.title }}</p>
                </div>

                <div class="mt-4">
                    <label class="mr-40 inline-block w-1/5" for="description">Description</label>
                    <textarea class="ml-4 w-6/12 rounded" id="description" placeholder="Description..."
                              v-model="form.description"></textarea>
                    <p class="text-red-600">{{ errors.description }}</p>
                </div>

                <div class="mt-4">
                    <label class="mr-40 inline-block w-1/5" for="start_date">Date de début</label>
                    <input class="ml-4 w-6/12 rounded" type="date" id="start_date" placeholder="start_date..."
                           v-model="form.start_date">
                    <p class="text-red-600">{{ errors.start_date }}</p>
                </div>

                <div class="mt-4">
                    <label class="mr-40 inline-block w-1/5" for="end_date">Date de fin</label>
                    <input class="ml-4 w-6/12 rounded" type="date" id="end_date" placeholder="end_date..."
                           v-model="form.end_date">
                    <p class="text-red-600">{{ errors.end_date }}</p>
                </div>

                <div class="mt-4">
                    <label class="mr-40 inline-block w-1/5" for="finished">Etat</label>
                    <select class="ml-4 w-6/12 rounded" v-model="form.finished">
                        <option :value="0">
                            Annulé
                        </option>
                        <option :value="1">
                            En cours
                        </option>
                        <option :value="2">
                            Terminé
                        </option>
                    </select>
                    <p class="text-red-600">{{ errors.finished }}</p>
                </div>

                <div class="mt-4">
                    <label class="mr-40 inline-block w-1/5" for="day_sold">Jours vendus</label>
                    <input class="ml-4 w-6/12 rounded" type="number" id="day_sold" placeholder="day_sold..."
                           v-model="form.day_sold">
                    <p class="text-red-600">{{ errors.day_sold }}</p>
                </div>


                <div class="buttons">
                    <button @click="close" class="bg-gray-300 font-bold py-2 px-8 rounded mr-3">Annuler</button>
                    <button class="bg-purple-700 hover:bg-purple-500 text-white font-bold py-2 px-8 rounded"
                            type="submit">Sauvegarder
                    </button>

                </div>

            </form>
        </div>

    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'

export default {
    components: {
        AppLayout,
    },
    props: ["errors", "project", "customers"],
    data() {
        return {
            delete: false,
            form: this.$inertia.form({
                title: null,
                description: null,
                start_date: null,
                end_date: null,
                finished: null,
                day_sold: null,
                customers_id: null,
                responsable_name: null,
                responsable_surname: null,
                responsable_number: null,
            })
        }
    },
    methods: {
        submit() {
            this.$inertia.put(this.route('projects.save', this.project.id), this.form)
        },
        deleteCustomers() {
            this.$inertia.delete(this.route('projects.delete', this.project.id))
        },
        deleteOpen() {
            if (this.delete === false) {
                this.delete = true
            } else {
                this.delete = false
            }
        }
    },
    mounted() {
        this.form.title = this.project.title
        this.form.description = this.project.description
        this.form.start_date = this.project.start_date
        this.form.end_date = this.project.end_date
        this.form.finished = this.project.finished
        this.form.day_sold = this.project.day_sold
        this.form.customers_id = this.project.customers_id
        this.form.responsable_name = this.project.responsable_name
        this.form.responsable_surname = this.project.responsable_surname
        this.form.responsable_number = this.project.responsable_number
    },
}
</script>

<style>
.translatediv {
    transform: translate(-50%, -50%);
    top: 50%;
    left: 50%;
}
</style>
