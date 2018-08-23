<template>
    <div>
        <!-- <heading class="mb-6">PHP Info</heading> -->
        <div v-if="loaded">
            <card v-for="(contents, title) in data" :key="title" class="flex flex-col mb-6 p-4">
                <h2 class="uppercase text-center mb-4" v-html="title"></h2>
                <div>
                    <div v-for="(item,index) in contents" :key="index" class="w-full mb-3 flex">
                        <div class="w-1/4 mr-4">
                            <div v-if="isNaN(index)" class="font-semibold">
                                {{index}}
                            </div>
                        </div>
                        <div class="w-3/4 px-2 font-thin">
                            <div v-if="Array.isArray(item)" class="w-full flex justify-around items-center">
                                <div v-for="(arrayitem, index) in item" :key="index" :class="'w-1/' + item.length" v-html="arrayitem">
                                   
                                </div>
                            </div>

                            <div v-else-if="item == 'enabled' || item == 'Yes'">
                                <svg class="w-4 h-4 text-success fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 8C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm0 48c110.532 0 200 89.451 200 200 0 110.532-89.451 200-200 200-110.532 0-200-89.451-200-200 0-110.532 89.451-200 200-200m140.204 130.267l-22.536-22.718c-4.667-4.705-12.265-4.736-16.97-.068L215.346 303.697l-59.792-60.277c-4.667-4.705-12.265-4.736-16.97-.069l-22.719 22.536c-4.705 4.667-4.736 12.265-.068 16.971l90.781 91.516c4.667 4.705 12.265 4.736 16.97.068l172.589-171.204c4.704-4.668 4.734-12.266.067-16.971z"/></svg>
                            </div>
                            <div v-else-if="item == 'disabled' || item == 'No'">
                                <svg class="w-4 h-4 text-danger fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm101.8-262.2L295.6 256l62.2 62.2c4.7 4.7 4.7 12.3 0 17l-22.6 22.6c-4.7 4.7-12.3 4.7-17 0L256 295.6l-62.2 62.2c-4.7 4.7-12.3 4.7-17 0l-22.6-22.6c-4.7-4.7-4.7-12.3 0-17l62.2-62.2-62.2-62.2c-4.7-4.7-4.7-12.3 0-17l22.6-22.6c4.7-4.7 12.3-4.7 17 0l62.2 62.2 62.2-62.2c4.7-4.7 12.3-4.7 17 0l22.6 22.6c4.7 4.7 4.7 12.3 0 17z"/></svg>
                            </div>
                            <div v-else v-html="item"></div>
                        </div>
                    </div>
                </div>
            </card>
        </div>
    </div>
</template>

<script>
export default {
    data: function () {
        return {
            loaded: false,
            data: null
        }
    },
    mounted() {
        this.fetch()
    },
    methods: {
        async fetch(){
            let self = this
            Nova.request().get('/nova-vendor/davidpiesse/nova-phpinfo/phpinfo').then(response => {
                self.data = response.data
                self.loaded=true
            })
        }
    }
}
</script>

<style>
    /* Scoped Styles */
</style>
