<template>
    <tr>
        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
            {{ projects.title }}
        </td>
        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
            {{ customer.social_reason }}
        </td>
        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
            {{ projects.description.substr(0, 20) }} ...
        </td>
        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
            <p v-if="projects.finished === '2'" class="text-red-900 font-semibold bg-red-100 text-center rounded p-1">
                Terminé</p>
            <p v-if="projects.finished === '1'"
               class="text-yellow-900 font-semibold bg-yellow-100 text-center rounded p-1">
                En cours</p>
            <p v-if="projects.finished === '0'"
               class="text-green-900 font-semibold bg-green-100 text-center rounded p-1">
                Annulé</p>
        </td>
        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
            <inertia-link class="text-indigo-600 hover:text-indigo-900"
                          :href="route('projects.edit', projects.id)">
                Editer
            </inertia-link>
        </td>
    </tr>
</template>

<script>
export default {
    name: "ProjectListItem",
    props: ['projects', 'customer'],
}
</script>

<style scoped>

</style>
