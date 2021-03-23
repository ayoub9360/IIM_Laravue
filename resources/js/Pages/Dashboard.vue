<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                    <div>
                        <div>
                            <p>Nombre de clients</p>
                            <p>{{ customers.length }} - <span>{{ customersIncrease.length }}</span></p>
                        </div>
                        <div>
                            <p>Nombre de projets</p>
                            <p>{{ projects.length }} - <span>{{ projectsIncrease.length }}</span></p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import Welcome from '@/Jetstream/Welcome'

export default {
    components: {
        AppLayout,
    },
    props: ['customers', 'projects', 'projectsIncrease', 'customersIncrease'],
}
</script>
