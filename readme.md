Add to your providers:

        Daylight\Theme\ThemeServiceProvider::class,

Add to your Facades:

        'Theme' => Daylight\Theme\Facades\ThemeFacade::class,

Publish the assets and config

    php artisan vendor:publish

Add the line to webpack.mix.js

   .sass('resources/assets/theme/sass/theme.scss', 'public/css')
   .js('resources/assets/theme/js/jscolor.min.js', 'public/js/jscolor.js')

Seed the theme table:

    php artisan db:seed --class=\\Daylight\\Theme\\database\\seeds\\ThemeSeeder
