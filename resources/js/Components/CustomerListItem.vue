<template>
    <tr>
        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
            {{ customer.social_reason }}
        </td>
        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
            {{ customer.description.substr(0, 20) }}...
        </td>
        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
            {{ customer.projects.length }}
        </td>
        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
            <inertia-link class="text-indigo-600 hover:text-indigo-900"
                          :href="route('customers.edit', customer.id)">
                Editer
            </inertia-link>
        </td>
    </tr>
</template>

<script>
export default {
    name: "ProjectListItem",
    props: ['customer'],
}
</script>

<style scoped>

</style>
