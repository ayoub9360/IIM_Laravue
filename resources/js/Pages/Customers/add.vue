<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Clients
            </h2>
        </template>

        <div class="flex justify-between max-w-7xl mx-auto sm:px-6 lg:px-8 pt-4">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Ajouter un client
            </h2>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pt-4 bg-gray-50">
            <form @submit.prevent="submit">
                <label for="description">Description</label>
                <input type="text" id="description" placeholder="Description..." v-model="form.description">
                <p>{{ errors.description }}</p>

                <label for="social_reason">Raison Social</label>
                <input type="text" id="social_reason" placeholder="Raison Social..." v-model="form.social_reason">
                <p>{{ errors.social_reason }}</p>

                <label for="legal_status">Status légal</label>
                <input type="text" id="legal_status" placeholder="Status légal..." v-model="form.legal_status">
                <p>{{ errors.legal_status }}</p>

                <label for="capital">capital</label>
                <input type="number" id="capital" placeholder="capital..." v-model="form.capital">
                <p>{{ errors.capital }}</p>

                <label for="siret_number">Numéro de siret</label>
                <input type="number" id="siret_number" placeholder="Numéro de siret..." v-model="form.siret_number">
                <p>{{ errors.siret_number }}</p>

                <label for="naf_code">naf code</label>
                <input type="number" id="naf_code" placeholder="naf_code..." v-model="form.naf_code">
                <p>{{ errors.naf_code }}</p>

                <label for="country">Pays</label>
                <input type="text" id="country" placeholder="Pays..." v-model="form.country">
                <p>{{ errors.country }}</p>

                <label for="adress">adress</label>
                <input type="text" id="adress" placeholder="Adresse..." v-model="form.adress">
                <p>{{ errors.adress }}</p>

                <label for="zip_code">Code Postal</label>
                <input type="number" id="zip_code" placeholder="Code Postal..." v-model="form.zip_code">
                <p>{{ errors.zip_code }}</p>

                <label for="city">city</label>
                <input type="text" id="city" placeholder="city..." v-model="form.city">
                <p>{{ errors.city }}</p>

                <button type="submit">Clique</button>
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
