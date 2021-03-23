<template>
    <tr>
        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
            {{ customer.social_reason }}
        </td>
        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
            {{ customer.description.substr(0, 20) }}...
        </td>
        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
            {{ projectLength }}
        </td>
        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
            <a href="#" class="text-indigo-600 hover:text-indigo-900">Editer</a>
        </td>
    </tr>
</template>

<script>
export default {
    name: "ProjectListItem",
    props: ['projects', 'customer'],
    data() {
        return {
            projectLength: 0
        }
    },
    mounted() {
        const result = this.projects.filter(element => element.customer_id === this.customer.id);
        this.projectLength = result.length
    }
}
</script>

<style scoped>

</style>
