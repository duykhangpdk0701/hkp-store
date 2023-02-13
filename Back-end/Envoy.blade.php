@servers(['develop' => ['ubuntu@13.212.106.96']])

@setup
    $now = new DateTime();
    $branch = isset($branch) ? $branch : 'develop';
    $env = isset($env) ? $env : 'develop';

    if ($branch === 'staging') {
    $webroot_path = '/home/hkp/';
    } else if($branch === 'master'){
    $webroot_path = '/home/hkpdev/';
    } else {
    $webroot_path = '/home/ubuntu/';
    }

    $webroot_folder = 'hkp-'.$branch;

    $app_dir = $webroot_path . 'web/' . $webroot_folder;

    $release = $branch . '-' . date('YmdHis');

    $laradock_app_dir = '/var/www/'.$webroot_folder;

    $laradock_dir = $webroot_path . 'laradock';
@endsetup

@story('deploy', ['on' => $env])
    update_code
    run_composer
    run_deploy_scripts
@endstory

@task('update_code')
    echo 'Updating code'
    cd {{ $app_dir }}
    git checkout {{ $branch }}
    git pull origin {{ $branch }}
@endtask

@task('run_composer')
    echo "Starting deployment ({{ $release }})"
    cd {{ $laradock_dir }}
    docker-compose exec -T workspace bash

    cd {{ $laradock_app_dir }}
    echo "Running composer..."
    composer install --prefer-dist --no-scripts -q -o --dev
@endtask

@task('run_deploy_scripts')
    cd {{ $laradock_dir }}
    docker-compose exec -T workspace bash

    echo 'Running deployment scripts'
    cd {{ $laradock_app_dir }}
    php artisan cache:clear
    php artisan config:clear
    php artisan view:clear
    php artisan storage:link
    php artisan migrate --seed
    php artisan optimize
    php artisan scribe:generate
    echo 'Running npm...'
@endtask
