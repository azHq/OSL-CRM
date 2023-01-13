const mix = require('laravel-mix');
const lodash = require("lodash");
const folder = {
    src: "resources/", // source files
    dist: "public/", // build files
    dist_assets: "public/assets/" //build assets files
};
/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */
 var third_party_assets = {
        css_js: [
            {"name": "jquery", "assets": ["./node_modules/jquery/dist/jquery.min.js"]},
            
        ]
    };

    //copying third party assets
    lodash(third_party_assets).forEach(function (assets, type) {
        if (type == "css_js") {
            lodash(assets).forEach(function (plugins) {
                var name = plugins['name'],
                    assetlist = plugins['assets'],
                    css = [],
                    js = [];
                lodash(assetlist).forEach(function (asset) {
                    var ass = asset.split(',');
                    for (let i = 0; i < ass.length; ++i) {
                        if(ass[i].substr(ass[i].length - 3)  == ".js") {
                            js.push(ass[i]);
                        } else {
                            css.push(ass[i]);
                        }
                    };
                });
                if(js.length > 0){
                    mix.combine(js, folder.dist_assets + "/plugins/" + name + "/" + name + ".min.js");
                }
                if(css.length > 0){
                    mix.combine(css, folder.dist_assets + "/plugins/" + name + "/" + name + ".min.css");
                }
            });
        }
    });

    mix.copy('resources/img', 'public/assets/img');
    mix.copy('resources/css/style.css', 'public/assets/css/style.css');
    mix.copy('resources/css/theme-settings.css', 'public/assets/css/theme-settings.css');
    mix.copy('resources/js/app.js', 'public/assets/js/app.js');
    mix.copy('resources/js/theme-settings.js', 'public/assets/js/theme-settings.js');
    mix.copy('resources/css/ckeditor.css', 'public/assets/css/ckeditor.css');
    mix.copy('resources/js/ckeditor.js', 'public/assets/js/ckeditor.js');
    mix.copy('resources/fonts', 'public/assets/fonts');
    mix.copy('resources/js/pages/chart.js', 'public/assets/js/chart.js');
    mix.copy('resources/js/pages/chartsLine.js', 'public/assets/js/chartsLine.js');
    mix.copy('resources/js/pages/form-validation.js', 'public/assets/js/form-validation.js');
    mix.copy('resources/js/pages/piechart.js', 'public/assets/js/piechart.js');
    mix.copy('resources/js/pages/sticky.js', 'public/assets/js/sticky.js');
    mix.copy('resources/css/feather.css', 'public/assets/css/feather.css');
    mix.copy('resources/css/line-awesome.min.css', 'public/assets/css/line-awesome.min.css');
    mix.copy('resources/js/pages/apex.min.js', 'public/assets/js/apex.min.js');
    mix.copy('resources/js/pages/mask.js', 'public/assets/js/mask.js');
    mix.copy('resources/js/pages/jquery.maskedinput.min.js', 'public/assets/js');

 
    mix.copy('node_modules/bootstrap/dist/css/bootstrap.css', 'public/assets/plugins/bootstrap/css');
    mix.copy('node_modules/bootstrap/dist/css/bootstrap.css.map', 'public/assets/plugins/bootstrap/css');
    mix.copy('node_modules/bootstrap/dist/css/bootstrap.min.css', 'public/assets/plugins/bootstrap/css');
    mix.copy('node_modules/bootstrap/dist/css/bootstrap.min.css.map', 'public/assets/plugins/bootstrap/css');
    mix.copy('node_modules/bootstrap/dist/js/bootstrap.bundle.js', 'public/assets/plugins/bootstrap/js');
    mix.copy('node_modules/bootstrap/dist/js/bootstrap.bundle.js.map', 'public/assets/plugins/bootstrap/js');
    mix.copy('node_modules/bootstrap/dist/js/bootstrap.bundle.min.js', 'public/assets/plugins/bootstrap/js');
    mix.copy('node_modules/bootstrap/dist/js/bootstrap.bundle.min.js.map', 'public/assets/plugins/bootstrap/js');

    mix.copy('node_modules/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js', 'public/assets/js');
    mix.copy('node_modules/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css', 'public/assets/css');

    mix.copy('node_modules/animate.css/animate.min.css', 'public/assets/css');
    mix.copy('node_modules/moment/min/moment.min.js', 'public/assets/js');
    mix.copy('node_modules/moment/min/moment.min.js.map', 'public/assets/js');

    
    mix.copy('node_modules/@fortawesome/fontawesome-free/css', 'public/assets/plugins/fontawesome/css');
    mix.copy('node_modules/@fortawesome/fontawesome-free/webfonts', 'public/assets/plugins/fontawesome/webfonts');
    mix.copy('node_modules/font-awesome/css/font-awesome.min.css', 'public/assets/css/font-awesome.min.css');
    mix.copy('node_modules/feather-icons/dist/feather.min.js', 'public/assets/js/feather.min.js');
    mix.copy('node_modules/feather-icons/dist/feather.min.js.map', 'public/assets/js/feather.min.js.map');

    mix.copy('node_modules/@adactive/bootstrap-tagsinput/dist/bootstrap-tagsinput.css', 'public/assets/plugins/bootstrap-tagsinput/css');
    mix.copy('node_modules/@adactive/bootstrap-tagsinput/dist/bootstrap-tagsinput.js', 'public/assets/plugins/bootstrap-tagsinput/js');
    mix.copy('node_modules/datatables.net/js/jquery.dataTables.min.js', 'public/assets/plugins/datatables/jquery.dataTables.min.js');

    mix.copy('node_modules/jquery-slimscroll/jquery.slimscroll.js', 'public/assets/plugins/slimscroll');
    mix.copy('node_modules/jquery-slimscroll/jquery.slimscroll.min.js', 'public/assets/plugins/slimscroll');
    mix.copy('node_modules/summernote/dist', 'public/assets/plugins/summernote/dist');

    mix.copy('node_modules/select2/dist/css', 'public/assets/plugins/select2/css');
    mix.copy('node_modules/select2/dist/js/select2.min.js', 'public/assets/plugins/select2/js');
    mix.copy('node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css', 'public/assets/plugins/datatables/datatables.min.css');
    mix.copy('node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js', 'public/assets/plugins/datatables/datatables.min.js');
    mix.copy('node_modules/raphael/raphael.min.js', 'public/assets/plugins/raphael/raphael.min.js');
    mix.copy('node_modules/sticky-kit/dist', 'public/assets/plugins/sticky-kit');
    mix.copy('node_modules/morris.js/morris.js', 'public/assets/plugins/morris.js/morris.js');
    mix.copy('node_modules/morris.js/morris.css', 'public/assets/plugins/morris.js/morris.css');
    mix.copy('node_modules/morris.js/morris.min.js', 'public/assets/plugins/morris.js/morris.min.js');
    //mix.copy('node_modules/line-awesome/dist/line-awesome/css/line-awesome.min.css', 'public/assets/css/lineawesome.min.css');
    mix.copy('node_modules/apexcharts/dist/apexcharts.js', 'public/assets/js/apexchart.js');
    mix.copy('node_modules/chart.js/dist/Chart.min.js', 'public/assets/js/linebar.min.js');

