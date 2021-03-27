<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Projets
            </h2>
        </template>

        <div class="flex justify-between max-w-7xl mx-auto sm:px-6 lg:px-8 py-4">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Projets
            </h2>
            <p class="bg-red-600 hover:bg-red-500 text-white font-bold py-2 px-8 rounded"
               @click="deleteOpen">
                Supprimer un projet
            </p>
        </div>

        <div v-if="delete"
             class="fixed translatediv max-w-4xl h-1/4 mx-auto sm:px-6 lg:px-8 p-4 bg-white rounded-md justify-center flex flex-col">
            <p class="text-center">Voulez vous vraiment supprimer le projet " {{ project.title }} " ?</p>
            <div class="flex justify-end">
                <p class="bg-white hover:bg-gray-100 border-gray-500 border mr-2 font-bold py-2 px-8 rounded"
                   @click="deleteOpen">
                    Annuler</p>
                <p class="bg-red-600 hover:bg-red-500 text-white font-bold py-2 px-8 rounded"
                   @click="deleteCustomers">Supprimer</p>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pt-4 bg-gray-50">
            <form @submit.prevent="submit">
                <label for="title">Titre</label>
                <input type="text" id="title" placeholder="Titre..." v-model="form.title">
                <p>{{ errors.title }}</p>

                <label for="description">Description</label>
                <input type="text" id="description" placeholder="Description..." v-model="form.description">
                <p>{{ errors.description }}</p>

                <label for="start_date">Date de début</label>
                <input type="date" id="start_date" placeholder="start_date..." v-model="form.start_date">
                <p>{{ errors.start_date }}</p>

                <label for="end_date">Date de fin</label>
                <input type="date" id="end_date" placeholder="end_date..." v-model="form.end_date">
                <p>{{ errors.end_date }}</p>

                <label for="finished">Etat</label>
                 <select v-model="form.finished" >
                    <option :value="0" >
                        Annulé
                    </option>
                    <option :value="1" >
                        En cours
                    </option>
                    <option :value="2" >
                        Terminé
                    </option>
                </select>
                <p>{{ errors.finished }}</p>

                <label for="day_sold">Jours vendus</label>
                <input type="number" id="day_sold" placeholder="day_sold..." v-model="form.day_sold">
                <p>{{ errors.day_sold }}</p>

                <label for="customers_id">Client du projet</label>
                <select v-model="form.customers_id" >
                    <option v-for="item in customers" :value="item.id" :key="item.id">
                        {{ item.social_reason }}
                    </option>
                </select>
                <p>{{ errors.customers_id }}</p>

                <label for="responsable_name">Nom responsable</label>
                <input type="text" id="responsable_name" placeholder="responsable_name..." v-model="form.responsable_name">
                <p>{{ errors.responsable_name }}</p>

                <label for="responsable_surname">Prénom responsable</label>
                <input type="text" id="responsable_surname" placeholder="responsable_surname..." v-model="form.responsable_surname">
                <p>{{ errors.responsable_surname }}</p>

                <label for="responsable_number">Numéro responsable</label>
                <input type="text" id="responsable_number" placeholder="responsable_number..." v-model="form.responsable_number">
                <p>{{ errors.responsable_number }}</p>

                <button class="bg-purple-700 hover:bg-purple-500 text-white font-bold py-2 px-8 rounded" type="submit">Valider</button>
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
form {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-content: center;
}

form p {
    color: red;
}

.translatediv {
    transform: translate(-50%, -50%);
    top: 50%;
    left: 50%;
}
</style>
