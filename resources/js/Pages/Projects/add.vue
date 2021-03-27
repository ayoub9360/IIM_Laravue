<template>
    <app-layout>

        <div class="flex justify-between max-w-7xl mx-auto sm:px-6 lg:px-8 pt-4">
            <h2 class="font-semibold text-4xl mb-2 text-gray-800 leading-tight">
                Créer un projet
            </h2>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pt-4 bg-gray-50 rounded-3xl shadow-lg border-2">
            <form class="" @submit.prevent="submit">
                <h2 class="text-2xl font-bold mb-2">Responsable projet</h2>
                <span>Ces informations serviront à savoir qui dirige le projet du coté du client</span>

                <div class="mt-4">
                    <label for="customers_id" class="mr-40 inline-block w-1/5">Client du projet</label>
                    <select id="customers_id"
                            class="ml-4 w-6/12 rounded"
                            v-model="form.customers_id">
                        <option v-for="item in customers" :value="item.id" :key="item.id">
                            {{ item.social_reason }}
                        </option>
                    </select>
                    <p class="text-red-600">{{ errors.customers_id }}</p>
                </div>

                <div class="mt-4">
                    <label class="mr-40 inline-block w-1/5" for="responsable_name">Nom du responsable</label>
                    <input type="text"
                           id="responsable_name"
                           placeholder="Nom du responsable..."
                           class="ml-4 w-6/12 rounded"
                           v-model="form.responsable_name">
                    <p class="text-red-600">{{ errors.responsable_name }}</p>
                </div>

                <div class="mt-4">
                    <label class="mr-40 inline-block w-1/5" for="responsable_surname">Prénom responsable</label>
                    <input type="text"
                           id="responsable_surname"
                           placeholder="Prénom du responsable..."
                           class="ml-4 w-6/12 rounded"
                           v-model="form.responsable_surname">
                    <p class="text-red-600">{{ errors.responsable_surname }}</p>
                </div>

                <div class="mt-4">
                    <label class="mr-40 inline-block w-1/5" for="responsable_number">Numéro responsable</label>
                    <input type="text"
                           id="responsable_number"
                           placeholder="Numéro du responsabke..."
                           v-model="form.responsable_number"
                           class="ml-4 w-6/12 rounded">
                    <p class="text-red-600">{{ errors.responsable_number }}</p>
                </div>


                <h2 class="mt-8 font-bold text-2xl">Information projet</h2>
                <span class="mt-2">Use a permanent address where you can receive mail.</span>

                <div class="mt-2">
                    <label class="mr-40 inline-block w-1/5" for="title">Titre</label>
                    <input type="text" id="title"
                           placeholder="Titre..."
                           v-model="form.title"
                           class="ml-4 w-6/12 rounded">
                    <p class="text-red-600">{{ errors.title }}</p>
                </div>

                <div class="mt-8">
                    <label class="mr-40 inline-block w-1/5" for="description">Description</label>
                    <textarea type="text" id="description"
                              placeholder="Description..."
                              v-model="form.description"
                              class="ml-4 w-6/12 rounded"></textarea>
                    <p class="text-red-600">{{ errors.description }}</p>
                </div>

                <div class="mt-8">
                    <label class="mr-40 inline-block w-1/5" for="start_date">Date de début</label>
                    <input type="date"
                           id="start_date"
                           v-model="form.start_date"
                           class="ml-4 w-6/12 rounded">
                    <p class="text-red-600">{{ errors.start_date }}</p>
                </div>

                <div class="mt-8">
                    <label class="mr-40 inline-block w-1/5" for="end_date">Date de fin</label>
                    <input type="date"
                           id="end_date"
                           v-model="form.end_date"
                           class="ml-4 w-6/12 rounded">
                    <p class="text-red-600">{{ errors.end_date }}</p>
                </div>

                <div class="mt-8">
                    <label class="mr-40 inline-block w-1/5" for="finished">Etat</label>
                    <select v-model="form.finished"
                            class="ml-4 w-6/12 rounded">
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

                <div class="mt-8">
                    <label class="mr-40 inline-block w-1/5" for="day_sold">Jours vendus</label>
                    <input type="number"
                           id="day_sold"
                           placeholder="Jours vendus..."
                           v-model="form.day_sold"
                           class="ml-4 w-6/12 rounded">
                    <p class="text-red-600">{{ errors.day_sold }}</p>
                </div>


                <div class="buttons mt-8 pb-4">
                    <button @click="close"
                            class="bg-gray-300 font-bold py-2 px-8 rounded mr-3">Annuler
                    </button>
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
    props: ["errors", "customers"],
    data() {
        return {
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
            this.$inertia.post(this.route('projects.create'), this.form)
        },
        close() {

        }
    },
}
</script>
