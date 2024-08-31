import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',

                // theme assets
                //favicon
                'resources/assets/img/favicon.png',

                //vendor css files
                'resources/assets/vendor/bootstrap/css/bootstrap.min.css',
                'resources/assets/vendor/bootstrap-icons/bootstrap-icons.css',
                'resources/assets/vendor/boxicons/css/boxicons.min.css',
                'resources/assets/vendor/quill/quill.snow.css',
                'resources/assets/vendor/quill/quill.bubble.css',
                'resources/assets/vendor/remixicon/remixicon.css',
                'resources/assets/vendor/simple-datatables/style.css',

                //main css
                'resources/assets/css/style.css',

                //Template Main JS File
                'resources/assets/js/main.js',

                //Vendor JS Files
                'resources/assets/vendor/apexcharts/apexcharts.min.js',
                'resources/assets/vendor/bootstrap/js/bootstrap.bundle.min.js',
                'resources/assets/vendor/chart.js/chart.umd.js',
                'resources/assets/vendor/echarts/echarts.min.js',
                'resources/assets/vendor/quill/quill.js',
                'resources/assets/vendor/simple-datatables/simple-datatables.js',
                'resources/assets/vendor/tinymce/tinymce.min.js',
                'resources/assets/vendor/php-email-form/validate.js',

                //adminprofile
            //    ' resources/assets/img/profile-img.jpg',
               
            ],
            refresh: true,
        }),
    ],
});
