<template>
    <tr>
        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
            {{ projects.title }}
        </td>
        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
            {{ projects.customer_id }}
        </td>
        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
            {{ projects.description.substr(0, 20) }} ...
        </td>
        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
            <p class="content">{{ projects.finished }}</p>
        </td>
        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
            <a href="#" class="text-indigo-600 hover:text-indigo-900">Editer</a>
        </td>
    </tr>
</template>

<script>
export default {
    name: "PostListItem",
    props: ['projects'],
}
</script>

<style scoped>

</style>
