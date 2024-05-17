<template>
  <Dropdown placement="bottom-end" class="relative">
    <Button variant="action" icon="globe-alt" class="text-primary-500 md:w-24" >
      <span class="hidden md:inline">{{ selectedDisplay }}</span>
    </Button>
    <template #menu>
      <DropdownMenu>
        <template v-for="(value,key) in langs">
          <nav class="flex flex-col py-1">
            <DropdownMenuItem
                              :key="key"
                               as="button"
                               class="flex items-center hover:bg-gray-100"
                               @click.prevent="changeLang(key)"
            >
              <span  class="ml-2" v-if="selected!==key">
                {{value}}
              </span>
              <span class="ml-2 font-mediun text-primary-500"  v-else>{{value}}</span>
            </DropdownMenuItem>
          </nav>
        </template>
      </DropdownMenu>
    </template>
  </Dropdown>
</template>

<script>
import { Button } from 'laravel-nova-ui'

export default {
  name: "LanguageSwitcher",
  components: { Button, Icon },
  props: [ 'langs', 'selected', 'selectedDisplay' ],
  methods:{
    changeLang(key) {
      if (key !== this.selected) {
        Nova.request().get('/nova-vendor/language-switch/change/'+ key).then(() => {
          window.location.reload();
        });
      }
    },
  }

}
</script>
