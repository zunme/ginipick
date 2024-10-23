import flatpickr from "flatpickr";
import { Korean } from "flatpickr/dist/l10n/ko.js"
//import Quill from "quill";
//import { ImageDrop } from 'quill-image-drop-module';
//import { ImageResize } from 'quill-image-resize-module';
 
//Quill.register('modules/imageResize', ImageResize);
//Quill.register('modules/imageDrop', ImageDrop);
/*
const quill = new Quill(editor, {
    // ...
    modules: {
        // ...
        imageDrop: true
    }
});
*/
import * as FilePond from "filepond";
import FilePondPluginImagePreview from 'filepond-plugin-image-preview';
FilePond.registerPlugin(FilePondPluginImagePreview);

//https://popper.js.org/docs/v2/tutorial/
import { createPopper } from "@popperjs/core";
flatpickr.localize(Korean);
window.flatpickr = flatpickr;
window.FilePond = FilePond;
//window.Quill = Quill;
window.createPopper = createPopper;