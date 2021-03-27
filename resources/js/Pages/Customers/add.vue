<template>
    <app-layout>

        <div class="flex justify-between max-w-7xl mx-auto sm:px-6 lg:px-8 pt-4">
            <h2 class="font-semibold text-4xl mb-2 text-gray-800 leading-tight">
                Ajouter un client
            </h2>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pt-4 bg-gray-50 rounded-3xl shadow-lg border-2">
            <form @submit.prevent="submit">
                <div class="mt-8">
                    <label for="description" class="mr-40 inline-block w-1/5">Description</label>
                    <input class="ml-4 w-6/12 rounded" type="text" id="description" placeholder="Description..."
                           v-model="form.description">
                    <p>{{ errors.description }}</p>
                </div>

                <div class="mt-8">
                    <label for="social_reason" class="mr-40 inline-block w-1/5">Raison Social</label>
                    <input class="ml-4 w-6/12 rounded" type="text" id="social_reason" placeholder="Raison Social..."
                           v-model="form.social_reason">
                    <p>{{ errors.social_reason }}</p>
                </div>

                <div class="mt-8">
                    <label for="legal_status" class="mr-40 inline-block w-1/5">Status légal</label>
                    <input class="ml-4 w-6/12 rounded" type="text" id="legal_status" placeholder="Status légal..."
                           v-model="form.legal_status">
                    <p>{{ errors.legal_status }}</p>
                </div>

                <div class="mt-8">
                    <label for="capital" class="mr-40 inline-block w-1/5">capital</label>
                    <input class="ml-4 w-6/12 rounded" type="number" id="capital" placeholder="capital..."
                           v-model="form.capital">
                    <p>{{ errors.capital }}</p>
                </div>

                <div class="mt-8">
                    <label for="siret_number" class="mr-40 inline-block w-1/5">Numéro de siret</label>
                    <input class="ml-4 w-6/12 rounded" type="number" id="siret_number" placeholder="Numéro de siret..."
                           v-model="form.siret_number">
                    <p>{{ errors.siret_number }}</p>
                </div>

                <div class="mt-8">
                    <label for="naf_code" class="mr-40 inline-block w-1/5">naf code</label>
                    <input class="ml-4 w-6/12 rounded" type="number" id="naf_code" placeholder="naf_code..."
                           v-model="form.naf_code">
                    <p>{{ errors.naf_code }}</p>
                </div>

                <div class="mt-8">
                    <label for="country" class="mr-40 inline-block w-1/5">Pays</label>
                    <input class="ml-4 w-6/12 rounded" type="text" id="country" placeholder="Pays..."
                           v-model="form.country">
                    <p>{{ errors.country }}</p>
                </div>

                <div class="mt-8">
                    <label for="adress" class="mr-40 inline-block w-1/5">adress</label>
                    <input class="ml-4 w-6/12 rounded" type="text" id="adress" placeholder="Adresse..."
                           v-model="form.adress">
                    <p>{{ errors.adress }}</p>
                </div>

                <div class="mt-8">
                    <label for="zip_code" class="mr-40 inline-block w-1/5">Code Postal</label>
                    <input class="ml-4 w-6/12 rounded" type="number" id="zip_code" placeholder="Code Postal..."
                           v-model="form.zip_code">
                    <p>{{ errors.zip_code }}</p>
                </div>

                <div class="mt-8">
                    <label for="city" class="mr-40 inline-block w-1/5">city</label>
                    <input class="ml-4 w-6/12 rounded" type="text" id="city" placeholder="city..." v-model="form.city">
                    <p>{{ errors.city }}</p>
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
    props: ["errors"],
    data() {
        return {
            form: this.$inertia.form({
                description: null,
                social_reason: null,
                legal_status: null,
                capital: null,
                siret_number: null,
                naf_code: null,
                country: null,
                adress: null,
                zip_code: null,
                city: null,
            })
        }
    },
    methods: {
        submit() {
            this.$inertia.post(this.route('customers.create'), this.form)
        }
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
</style>
