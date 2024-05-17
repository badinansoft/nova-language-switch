import LanguageSwitcher from "./components/LanguageSwitcher";
import { createVNode, render} from 'vue';

Nova.booting((app, store) => {

    app.mixin({
        data() {
            return {
                toDestroy: [],
            }
        },
        async mounted() {
            if (this._.type?.__file?.endsWith('MainHeader.vue')) {
                const screen = this._.attrs[ 'data-screen' ]
                
                console.log('language-switcher:mounted',screen);

                const languages = Nova.config('nova_language_switcher').languages;
                let selected = Nova.config('nova_language_switcher').current_lang;

                const container = document.createElement('div')
                container.className = 'relative z-50';

                const vnode = createVNode(LanguageSwitcher, { 
                    langs: languages,
                    selectedDisplay:languages[selected],
                    selected:selected
                })

                vnode.appContext = app._context
                render(vnode, container)

                const element = this._.vnode.el.querySelector('header > div:last-child > div:last-child > div');
                if (element) {
                    element.insertAdjacentElement('beforebegin', container)               
                }
            }
        }
    })
})


