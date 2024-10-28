//import { Livewire } from '../../vendor/livewire/livewire/dist/livewire.esm';

import Alpine from 'alpinejs';
import persist from '@alpinejs/persist'
import mask from '@alpinejs/mask'
import collapse from '@alpinejs/collapse'
import morph from '@alpinejs/morph'
import focus from '@alpinejs/focus'

import intersect from '@alpinejs/intersect'
import resize from '@alpinejs/resize'

Alpine.plugin(mask)
Alpine.plugin(persist)
Alpine.plugin(collapse)
Alpine.plugin(morph)
Alpine.plugin(focus)

Alpine.plugin(resize)
Alpine.plugin(intersect)

Alpine.data('imgPreview', () => ({
    imgsrc:null,
    previewFile() {
        let file = this.$refs.myFile.files[0];
        if(!file || file.type.indexOf('image/') === -1) return;
        this.imgsrc = null;
        let reader = new FileReader();

        reader.onload = e => {
            this.imgsrc = e.target.result;
        }

        reader.readAsDataURL(file);
    
    }
  }))
  
window.Alpine = Alpine;
Alpine.start();
//Livewire.start()