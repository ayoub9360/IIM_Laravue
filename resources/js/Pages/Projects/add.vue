<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Projets
            </h2>
        </template>

        <div class="flex justify-between max-w-7xl mx-auto sm:px-6 lg:px-8 pt-4">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Ajouter un projet
            </h2>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pt-4 bg-gray-50">
            <form @submit.prevent="submit">
                <label for="title">Titre</label>
                <input type="text" id="title" placeholder="Titre..." v-model="form.title">
                <p>{{ errors.title }}</p>

                <label for="description">Description</label>
                <input type="text" id="description" placeholder="Description..." v-model="form.description">
                <p>{{ errors.description }}</p>

                <label for="start_date">start_date</label>
                <input type="date" id="start_date" placeholder="start_date..." v-model="form.start_date">
                <p>{{ errors.start_date }}</p>

                <label for="end_date">end_date</label>
                <input type="date" id="end_date" placeholder="end_date..." v-model="form.end_date">
                <p>{{ errors.end_date }}</p>

                <label for="finished">finished</label>
                <input type="text" id="finished" placeholder="finished..." v-model="form.finished">
                <p>{{ errors.finished }}</p>

                <label for="day_sold">day_sold</label>
                <input type="number" id="day_sold" placeholder="day_sold..." v-model="form.day_sold">
                <p>{{ errors.day_sold }}</p>

                <label for="customers_id">Client Id</label>
                <select v-model="form.customers_id" >
                    <option v-for="item in customers" :value="item.id" :key="item.id">
                        {{ item.social_reason }}
                    </option>
                </select>
                <p>{{ errors.customers_id }}</p>

                <label for="responsable_name">responsable_name</label>
                <input type="text" id="responsable_name" placeholder="responsable_name..." v-model="form.responsable_name">
                <p>{{ errors.responsable_name }}</p>

                <label for="responsable_surname">responsable_surname</label>
                <input type="text" id="responsable_surname" placeholder="responsable_surname..." v-model="form.responsable_surname">
                <p>{{ errors.responsable_surname }}</p>

                <label for="responsable_number">responsable_number</label>
                <input type="text" id="responsable_number" placeholder="responsable_number..." v-model="form.responsable_number">
                <p>{{ errors.responsable_number }}</p>

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
