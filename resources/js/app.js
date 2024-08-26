import './bootstrap';
import DecoupledEditor from '@ckeditor/ckeditor5-build-decoupled-document/build/ckeditor';
import Essentials from '@ckeditor/ckeditor5-essentials/src/essentials';
import Paragraph from '@ckeditor/ckeditor5-paragraph/src/paragraph';
import Bold from '@ckeditor/ckeditor5-basic-styles/src/bold';
import Italic from '@ckeditor/ckeditor5-basic-styles/src/italic';
import Underline from '@ckeditor/ckeditor5-basic-styles/src/underline';
import FontSize from '@ckeditor/ckeditor5-font/src/fontsize';
import FontColor from '@ckeditor/ckeditor5-font/src/fontcolor';
import Alignment from '@ckeditor/ckeditor5-alignment/src/alignment';
import Table from '@ckeditor/ckeditor5-table/src/table';
import TableToolbar from '@ckeditor/ckeditor5-table/src/tabletoolbar';
import Image from '@ckeditor/ckeditor5-image/src/image';
import ImageToolbar from '@ckeditor/ckeditor5-image/src/imagetoolbar';
import ImageCaption from '@ckeditor/ckeditor5-image/src/imagecaption';
import ImageStyle from '@ckeditor/ckeditor5-image/src/imagestyle';


import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


document.addEventListener("DOMContentLoaded", function () {
    DecoupledEditor
        .create(document.querySelector('#editor'), {
            plugins: [
                Essentials, Paragraph, Bold, Italic, Underline,
                FontSize, FontColor, Alignment, Table, TableToolbar,
                Image, ImageToolbar, ImageCaption, ImageStyle
            ],
            toolbar: [
                'heading', '|',
                'bold', 'italic', 'underline', '|',
                'fontsize', 'fontcolor', '|',
                'alignment', '|',
                'insertTable', 'imageUpload', '|',
                'undo', 'redo'
            ]
        })
        .then(editor => {
            const toolbarContainer = document.querySelector('#toolbar-container');
            toolbarContainer.appendChild(editor.ui.view.toolbar.element);
        })
        .catch(error => {
            console.error(error);
        });
});
