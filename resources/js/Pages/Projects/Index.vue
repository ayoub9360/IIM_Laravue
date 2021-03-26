<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Projets
            </h2>
        </template>

        <div class="flex justify-between max-w-7xl mx-auto sm:px-6 lg:px-8 pt-4">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Projets
            </h2>
            <inertia-link class="bg-purple-700 hover:bg-purple-500 text-white font-bold py-2 px-8 rounded"
                          :href="route('projects.add')">
                Créer un projet
            </inertia-link>
        </div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <ProjectList :customers="Customer" :projects="projects"></ProjectList>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import ProjectList from '@/Components/ProjectList'

export default {
    components: {
        AppLayout,
        ProjectList
    },
    props: ['projects', 'Customer'],
}
</script>
