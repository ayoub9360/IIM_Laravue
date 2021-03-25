<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Clients
            </h2>
        </template>

        <div class="flex justify-between max-w-7xl mx-auto sm:px-6 lg:px-8 py-4">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Clients
            </h2>
            <p class="bg-red-600 hover:bg-red-500 text-white font-bold py-2 px-8 rounded"
               @click="deleteOpen">
                Supprimer un client
            </p>
        </div>

        <div v-if="delete"
             class="fixed translatediv max-w-4xl h-1/4 mx-auto sm:px-6 lg:px-8 p-4 bg-white rounded-md justify-center flex flex-col">
            <p class="text-center">Voulez vous vraiment supprimer le client " {{ customer.social_reason }} " ?</p>
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
import ProjectList from '@/Components/ProjectList'

export default {
    components: {
        AppLayout,
    },
    props: ["errors", "customer"],
    data() {
        return {
            delete: false,
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
            this.$inertia.put(this.route('customers.save', this.customer.id), this.form)
        },
        deleteCustomers() {
            this.$inertia.delete(this.route('customers.delete', this.customer.id))
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
        this.form.description = this.customer.description
        this.form.social_reason = this.customer.social_reason
        this.form.legal_status = this.customer.legal_status
        this.form.capital = this.customer.capital
        this.form.siret_number = this.customer.siret_number
        this.form.naf_code = this.customer.naf_code
        this.form.country = this.customer.country
        this.form.adress = this.customer.adress
        this.form.zip_code = this.customer.zip_code
        this.form.city = this.customer.city
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
