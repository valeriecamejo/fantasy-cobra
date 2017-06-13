# config valid only for current version of Capistrano
lock "3.8.0"

set :application, "fantasycobra-ng"
set :repo_url, "git@gitlab.com:ddh-condor/ng-fantasyCobra.git"

# Which roles to consider as laravel roles
set :laravel_roles, :all

# The artisan flags to include on artisan commands by default
set :laravel_artisan_flags, "--env=#{fetch(:stage)}"

# Which roles to use for running migrations
set :laravel_migration_roles, :all

# The artisan flags to include on artisan commands by default when running migrations
set :laravel_migration_artisan_flags, "--force --env=#{fetch(:stage)}"

# The version of laravel being deployed
set :laravel_version, 5.4

# Whether to upload the dotenv file on deploy
set :laravel_upload_dotenv_file_on_deploy, true

# Which dotenv file to transfer to the server
set :laravel_dotenv_file, './.env.production'

# The user that the server is running under (used for ACLs)
set :laravel_server_user, 'deploy'

# Ensure the dirs in :linked_dirs exist?
set :laravel_ensure_linked_dirs_exist, true

# Link the directores in laravel_linked_dirs?
set :laravel_set_linked_dirs, true

# Linked directories for a standard Laravel 5 application
set :laravel_5_linked_dirs, [
  'storage'
]

# Ensure the paths in :file_permissions_paths exist?
set :laravel_ensure_acl_paths_exist, true

# Set ACLs for the paths in laravel_acl_paths?
set :laravel_set_acl_paths, true

# Paths that should have ACLs set for a standard Laravel 5 application
set :laravel_5_acl_paths, [
  'bootstrap/cache',
  'storage',
  'storage/app',
  'storage/app/public',
  'storage/framework',
  'storage/framework/cache',
  'storage/framework/sessions',
  'storage/framework/views',
  'storage/logs'
]

set :deploy_to, "/srv/apps/#{fetch(:application)}"

#server 'fantasycobra.com', user: 'deploy', roles: %w{app db web}

set :slackistrano, {
  channel: '#fantasycobra-ng',
  webhook: 'https://hooks.slack.com/services/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'
}

namespace :deploy do
    desc "Build"
    after :updated, :build do
        on roles(:web) do
            within release_path  do
                #execute :composer, "install --no-dev --quiet"
                execute :php, "artisan clear-compiled"
                execute :php, "artisan optimize"
                execute :php, "artisan cache:clear"
                execute :php, "artisan view:clear"

                execute :php, "artisan config:cache"

                invoke 'laravel:migrate'

                #sudo 'service php7.0-fpm restart'
            end
        end
    end
end
