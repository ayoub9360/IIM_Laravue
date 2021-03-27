<template>
    <app-layout>
        <div class="flex justify-between max-w-7xl mx-auto sm:px-6 lg:px-8 pt-4">
            <h2 class="font-semibold text-4xl mb-2 text-gray-800 leading-tight">
                Dashboard
            </h2>
        </div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-10">

                    <div class="flex justify-around">
                        <div class="bg-gray-800 p-5 rounded-lg text-white text-center relative">
                            <p>Nombre de clients : </p>
                            <p>{{ customers.length }}
                                <span v-if="customersIncrease.length >= 1" class="text-green-600 font-semibold">
                                    ▲{{ customersIncrease.length }}
                                </span>
                                <span v-if="customersIncrease.length <= 1" class="text-red-600 font-semibold">
                                    ▼{{ customersIncrease.length }}
                                </span>
                            </p>
                        </div>

                        <div class="bg-gray-800 p-5 rounded-lg text-white text-center relative">
                            <p>Nombre de projet : </p>
                            <p>{{ projects.length }}
                                <span v-if="projectsGrowth >= 1" class="text-green-600 font-semibold">
                                    ▲{{ projectsGrowth }}%
                                </span>
                                <span v-if="projectsGrowth <= 1" class="text-red-600 font-semibold">
                                    ▼{{ projectsGrowth }}
                                </span>
                            </p>
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
    computed: {
        projectsGrowth() {
            const growth = (100 * this.projectsIncrease.length) / this.projects.length;
            return growth.toFixed(1)
        }
    }
}
</script>
