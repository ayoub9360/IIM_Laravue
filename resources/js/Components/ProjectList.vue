<template>
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
        <tr>
            <th scope="col"
                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Titre
            </th>
            <th scope="col"
                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Client
            </th>
            <th scope="col"
                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Description
            </th>
            <th scope="col"
                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Tickets
            </th>
            <th scope="col" class="relative px-6 py-3">
                <span class="sr-only">Editer</span>
            </th>
        </tr>
        </thead>
        <tbody>
        <!-- Odd row -->
        <ProjectListItem :customer="customers[post.customers_id-1]" :projects="post" v-for="(post,index) in projects"
                         :key="index"/>
        </tbody>
    </table>
</template>

<script>
import ProjectListItem from "@/Components/ProjectListItem";

export default {
    name: "ProjectList",
    components: {ProjectListItem},
    props: ['projects', 'customers'],
}
</script>

<style scoped>
</style>
